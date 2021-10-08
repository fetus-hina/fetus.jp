<?php

declare(strict_types=1);

use Codeception\Actor;
use _generated\UnitTesterActions;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 * phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */
class UnitTester extends Actor
{
    use UnitTesterActions;

    public function english(): object
    {
        return $this->language('en-US');
    }

    public function language(string $languageCode): object
    {
        $backup = new class (Yii::$app->language) {
            // phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
            public function __construct(private $oldValue)
            {
            }

            public function __destruct()
            {
                Yii::$app->language = $this->oldValue;
            }
        };

        Yii::$app->language = $languageCode;

        return $backup;
    }
}
