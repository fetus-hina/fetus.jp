<?php

declare(strict_types=1);

namespace app\models;

use DateTimeImmutable;
use DateTimeZone;
use Yii;
use app\behaviors\TimestampBehavior;

/**
 * This is the model class for table "sense_log".
 *
 * @property integer $id
 * @property integer $sensor_id
 * @property string $remote_addr
 * @property string $at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Barometer $barometer
 * @property Hygrothermograph $hygrothermograph
 * @property Sensor $sensor
 */
class SenseLog extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
        ];
    }
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
            [['sensor_id', 'remote_addr', 'at'], 'required'],
            [['sensor_id'], 'integer'],
            [['remote_addr'], 'string'],
            [['at', 'created_at', 'updated_at'], 'safe'],
            [['sensor_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Sensor::className(),
                'targetAttribute' => ['sensor_id' => 'id'],
            ],
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
            'remote_addr' => 'Remote Addr',
            'at' => 'At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarometer()
    {
        return $this->hasOne(Barometer::className(), ['log_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHygrothermograph()
    {
        return $this->hasOne(Hygrothermograph::className(), ['log_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['id' => 'sensor_id']);
    }

    public function toApiResponse(): array
    {
        return [
            'id' => $this->id,
            'sensor' => $this->sensor->toApiResponse(),
            'pressure' => $this->barometer
                ? (float)$this->barometer->pressure
                : null,
            'temperature' => $this->hygrothermograph
                ? (float)$this->hygrothermograph->temperature
                : null,
            'humidity' => $this->hygrothermograph
                ? (float)$this->hygrothermograph->humidity
                : null,
            'at' => (new DateTimeImmutable($this->at))
                ->setTimezone(new DateTimeZone('Etc/UTC'))
                ->format('c'),
        ];
    }
}
