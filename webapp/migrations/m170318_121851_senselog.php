<?php

declare(strict_types=1);

use app\db\Migration;

final class m170318_121851_senselog extends Migration
{
    public function up()
    {
        $b64_512 = strlen(base64_encode(str_repeat(' ', 512 / 8)));
        $this->createTable('sensor', [
            'id'            => $this->primaryKey(),
            'auth_key'      => $this->uuid()->notNull()->unique(),
            'auth_secret'   => $this->string($b64_512)->notNull(),
            'name'          => $this->string(64)->notNull(),
            'enabled'       => $this->boolean()->notNull()->defaultValue(true),
            'created_at'    => $this->timestampTZ()->notNull(),
            'updated_at'    => $this->timestampTZ()->notNull(),
        ]);
        $this->createTable('sense_log', [
            'id'            => $this->bigPrimaryKey(),
            'sensor_id'     => $this->pkRef('sensor'),
            'remote_addr'   => $this->inet()->notNull(),
            'at'            => $this->timestampTZ()->notNull(),
            'created_at'    => $this->timestampTZ()->notNull(),
            'updated_at'    => $this->timestampTZ()->notNull(),
        ]);
        $this->createIndex('ix_sense_log_at', 'sense_log', ['sensor_id', 'at']);
        $this->createTable('hygrothermograph', [
            'log_id'        => $this->bigPkRef('sense_log'),
            'temperature'   => $this->decimal(4, 2)->notNull(),
            'humidity'      => $this->decimal(5, 2)->notNull(),
            'PRIMARY KEY([[log_id]])',
        ]);
        $this->createTable('barometer', [
            'log_id'        => $this->bigPkRef('sense_log'),
            'pressure'      => $this->decimal(6, 2)->notNull(),
            'PRIMARY KEY([[log_id]])',
        ]);
    }

    public function down()
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
    }
}
