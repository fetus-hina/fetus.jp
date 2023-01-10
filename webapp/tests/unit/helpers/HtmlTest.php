<?php

declare(strict_types=1);

namespace tests\helpers;

use Codeception\Test\Unit;
use DOMDocument;
use DOMElement;
use DOMXPath;
use Exception;
use UnitTester;
use app\helpers\Html;

use function count;

final class HtmlTest extends Unit
{
    protected UnitTester $tester;

    public function testRelativeLink(): void
    {
        // 同一オリジン内のリンクは target, rel ともに何も起きていないはず
        $node = static::fragmentToDOM(Html::a(Html::encode('test'), '/'));
        $this->assertEquals('a', $node->nodeName);
        $this->assertEquals('test', $node->nodeValue);
        $this->assertFalse($node->hasAttribute('target'));
        $this->assertFalse($node->hasAttribute('rel'));
    }

    public function testAbsoluteLink(): void
    {
        // 別オリジンへのリンクは自動的に target="_blank" とかになる
        $node = static::fragmentToDOM(Html::a(Html::encode('test'), 'http://example.com/'));
        $this->assertEquals('a', $node->nodeName);
        $this->assertEquals('test', $node->nodeValue);
        $this->assertEquals('_blank', $node->getAttribute('target'));
        $this->assertRegExp('/\bnoopener\b/', $node->getAttribute('rel'));
        $this->assertRegExp('/\bnoreferrer\b/', $node->getAttribute('rel'));

        // 既に target があれば target は書き変わらない
        $node = static::fragmentToDOM(Html::a(Html::encode('test'), 'http://example.com/', ['target' => '_self']));
        $this->assertEquals('a', $node->nodeName);
        $this->assertEquals('test', $node->nodeValue);
        $this->assertEquals('_self', $node->getAttribute('target'));
        $this->assertRegExp('/\bnoopener\b/', $node->getAttribute('rel'));
        $this->assertRegExp('/\bnoreferrer\b/', $node->getAttribute('rel'));

        // 既に rel があれば rel は書き変わらない
        $node = static::fragmentToDOM(Html::a(Html::encode('test'), 'http://example.com/', ['rel' => 'dummy']));
        $this->assertEquals('a', $node->nodeName);
        $this->assertEquals('test', $node->nodeValue);
        $this->assertEquals('_blank', $node->getAttribute('target'));
        $this->assertEquals('dummy', $node->getAttribute('rel'));
    }

    private static function fragmentToDOM(string $fragment): DOMElement
    {
        $html = <<<EOF
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
            <html lang="en">
              <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title></title>
              </head>
              <body>$fragment</body>
            </html>
EOF;
        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->recover = true;
        if (!$doc->loadHTML($html)) {
            throw new Exception('Failed to load HTML fragment');
        }

        $xpath = new DOMXPath($doc);
        $list = $xpath->query('//body');
        if (count($list) > 0) {
            return $list->item(0)->firstChild;
        }
        throw new Exception('Could not find body element');
    }
}
