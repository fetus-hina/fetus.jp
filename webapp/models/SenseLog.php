<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sense_log".
 *
 * @property integer $id
 * @property integer $sensor_id
 * @property string $at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Barometer[] $barometers
 * @property Hygrothermograph[] $hygrothermographs
 * @property Sensor $sensor
 */
class SenseLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sense_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sensor_id', 'at', 'created_at', 'updated_at'], 'required'],
            [['sensor_id'], 'integer'],
            [['at', 'created_at', 'updated_at'], 'safe'],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sensor_id' => 'Sensor ID',
            'at' => 'At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarometers()
    {
        return $this->hasMany(Barometer::className(), ['log_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHygrothermographs()
    {
        return $this->hasMany(Hygrothermograph::className(), ['log_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['id' => 'sensor_id']);
    }
}
