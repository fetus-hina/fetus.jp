<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensor".
 *
 * @property integer $id
 * @property string $auth_key
 * @property string $name
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 *
 * @property SenseLog[] $senseLogs
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'name', 'created_at', 'updated_at'], 'required'],
            [['auth_key'], 'string'],
            [['enabled'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['auth_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'name' => 'Name',
            'enabled' => 'Enabled',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSenseLogs()
    {
        return $this->hasMany(SenseLog::className(), ['sensor_id' => 'id']);
    }
}
