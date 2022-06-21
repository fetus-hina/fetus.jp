<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\base\Model;
use yii\validators\InlineValidator;
use yii\web\Response;

final class AvatarDownloadForm extends Model
{
    public ?string $category = null;
    public ?string $file = null;

    public function rules()
    {
        return [
            [['category', 'file'], 'required'],
            [['category', 'file'], 'string', 'min' => 1],

            [['category'], 'in',
                'range' => [
                    'cm3d2',
                    'com3d2',
                    'com3d25',
                ],
            ],
            [['file'], 'match',
                'pattern' => '/\A[0-9a-zA-Z_.-]+\z/',
            ],
            [['file'], 'validateFileExists'],
        ];
    }

    public function download(Response $resp): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $path = $this->getRealPath();
        $resp->sendFile($path, $this->file, [
            'mimeType' => 'application/octet-stream',
            'inline' => false,
        ]);
        return true;
    }

    public function validateFileExists(
        string $attribute,
        mixed $params,
        InlineValidator $validator,
        mixed $current,
    ): void {
        if ($this->hasErrors()) {
            return; // @codeCoverageIgnore
        }

        $path = $this->getRealPath();
        if (
            !\file_exists($path) ||
            !\is_readable($path) ||
            \filesize($path) < 1 ||
            \str_contains($path, '/.')
        ) {
            $this->addError($attribute, 'file does not exist');
            return;
        }
    }

    private function getRealPath(): string
    {
        return Yii::getAlias('@app/data/avatar') . '/' . $this->category . '/' . $this->file;
    }
}
