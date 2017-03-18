<?php
use yii\db\Migration;

class m170318_121851_senselog extends Migration
{
    public function up()
    {
        $this->createTable('sensor', [
            'id'            => $this->primaryKey(),
            'auth_key'      => 'UUID NOT NULL UNIQUE',
            'name'          => $this->string(64)->notNull(),
            'enabled'       => $this->boolean()->notNull()->defaultValue(true),
            'created_at'    => 'TIMESTAMP WITH TIME ZONE NOT NULL',
            'updated_at'    => 'TIMESTAMP WITH TIME ZONE NOT NULL',
        ]);
        $this->createTable('sense_log', [
            'id'            => $this->bigPrimaryKey(),
            'sensor_id'     => 'INTEGER NOT NULL REFERENCES {{sensor}}([[id]])',
            'at'            => 'TIMESTAMP WITH TIME ZONE NOT NULL',
            'created_at'    => 'TIMESTAMP WITH TIME ZONE NOT NULL',
            'updated_at'    => 'TIMESTAMP WITH TIME ZONE NOT NULL',
        ]);
        $this->createIndex('ix_sense_log_at', 'sense_log', ['sensor_id', 'at']);
        $this->createTable('hygrothermograph', [
            'log_id'        => 'BIGINT NOT NULL REFERENCES {{sense_log}}([[id]])',
            'temperature'   => $this->decimal(4, 2)->notNull(),
            'humidity'      => $this->decimal(5, 2)->notNull(),
        ]);
        $this->createTable('barometer', [
            'log_id'        => 'BIGINT NOT NULL REFERENCES {{sense_log}}([[id]])',
            'pressure'      => $this->decimal(6, 2)->notNull(),
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
