<?php
namespace app\behaviors;

class TimestampBehavior extends \yii\behaviors\TimestampBehavior
{
    protected function getValue($event)
    {
        if ($this->value === null) {
            $now = $_SERVER['REQUEST_TIME'] ?? time();
            return gmdate('Y-m-d\TH:i:sP', $now);
        }
        return parent::getValue($event);
    }
}
