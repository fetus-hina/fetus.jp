<?php

declare(strict_types=1);

use yii\db\Migration;

final class m210608_195410_drop_logs extends Migration
{
    public function safeUp()
    {
        $tables = [
            'barometer',
            'hygrothermograph',
            'sense_log',
            'sensor',
        ];

        foreach ($tables as $table) {
            $this->dropTable($table);
        }

        return true;
    }

    public function safeDown()
    {
        return false;
    }
}
