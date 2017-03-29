<?php
namespace app\db;

use yii\db\Migration as MigrationAbstract;
use yii\db\Schema;

class Migration extends MigrationAbstract
{
    public function uuid()
    {
        return $this->schema('UUID');
    }

    public function inet()
    {
        return $this->schema('INET');
    }

    public function timestampTZ(int $precision = 0, bool $withTZ = true)
    {
        $type = sprintf('TIMESTAMP(%d) %s TIME ZONE', $precision, $withTZ ? 'WITH' : 'WITHOUT');
        return $this->schema($type, Schema::TYPE_TIMESTAMP);
    }

    public function pkRef(string $table, string $column = 'id')
    {
        return $this->integer()->notNull()->append(sprintf(
            'REFERENCES {{%s}}([[%s]])',
            $table,
            $column
        ));
    }

    public function bigPkRef(string $table, string $column = 'id')
    {
        return $this->bigInteger()->notNull()->append(sprintf(
            'REFERENCES {{%s}}([[%s]])',
            $table,
            $column
        ));
    }

    protected function schema($type, $schemaType = Schema::TYPE_STRING)
    {
        $builder = $this->getDb()->getSchema()->createColumnSchemaBuilder($type);
        $builder->categoryMap[$type] = $builder->categoryMap[$schemaType];
        return $builder;
    }
}
