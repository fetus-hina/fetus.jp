<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hygrothermograph".
 *
 * @property integer $log_id
 * @property string $temperature
 * @property string $humidity
 *
 * @property SenseLog $log
 */
class Hygrothermograph extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hygrothermograph';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id', 'temperature', 'humidity'], 'required'],
            [['log_id'], 'integer'],
            [['temperature', 'humidity'], 'number'],
            [['log_id'], 'exist', 'skipOnError' => true, 'targetClass' => SenseLog::className(), 'targetAttribute' => ['log_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'temperature' => 'Temperature',
            'humidity' => 'Humidity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLog()
    {
        return $this->hasOne(SenseLog::className(), ['id' => 'log_id']);
    }
}
