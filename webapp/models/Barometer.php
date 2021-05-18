<?php

declare(strict_types=1);

namespace app\models;

use Yii;

/**
 * This is the model class for table "barometer".
 *
 * @property integer $log_id
 * @property string $pressure
 *
 * @property SenseLog $log
 */
class Barometer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barometer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id', 'pressure'], 'required'],
            [['log_id'], 'integer'],
            [['pressure'], 'number'],
            [['log_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => SenseLog::class,
                'targetAttribute' => ['log_id' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'pressure' => 'Pressure',
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
