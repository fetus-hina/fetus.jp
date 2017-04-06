<?php
namespace app\models\api;

use Yii;
use app\models\Barometer;
use app\models\Hygrothermograph;
use app\models\SenseLog as SenseLogModel;
use app\models\Sensor;
use yii\base\Model;
use yii\behaviors\AttributeBehavior;

class SenseLog extends Model
{
    public $sensor_id;
    public $remote_addr;
    public $temperature;
    public $humidity;
    public $pressure;
    public $at;

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    Model::EVENT_BEFORE_VALIDATE => 'remote_addr',
                ],
                'value' => function ($event) {
                    if (!$addr = trim($event->sender->remote_addr)) {
                        $addr = Yii::$app->request->userIP ?? '127.0.0.2';
                    }
                    return $addr;
                },
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    Model::EVENT_BEFORE_VALIDATE => 'at',
                ],
                'value' => function ($event) {
                    $value = trim($event->sender->at);
                    if ($value !== '') {
                        if (preg_match('/^\d+$/', $value)) {
                            return (int)$value;
                        }
                        if ($t = @strtotime($value)) {
                            return $t;
                        }
                    }
                    return $_SERVER['REQUEST_TIME'];
                },
            ],
        ];
    }

    public function rules()
    {
        return [
            [['sensor_id', 'remote_addr', 'at'], 'required'],
            [['sensor_id'], 'integer'],
            [['sensor_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Sensor::class,
                'targetAttribute' => ['sensor_id' => 'id'],
            ],
            [['remote_addr'], 'ip', 'ipv4' => true, 'ipv6' => true, 'subnet' => false],
            [['temperature'], 'double', 'min' => -100, 'max' => 100],
            [['humidity'], 'double', 'min' => 0, 'max' => 100],
            [['pressure'], 'double', 'min' => 500, 'max' => 1500],
            [['at'], 'integer'],
        ];
    }

    public function save()
    {
        $log = Yii::createObject([
            'class'         => SenseLogModel::class,
            'sensor_id'     => $this->sensor_id,
            'remote_addr'   => $this->remote_addr,
            'at'            => date('Y-m-d\TH:i:sP', $this->at),
        ]);
        if (!$log->validate() || !$log->save()) {
            return false;
        }

        if ($this->temperature != '' && $this->humidity != '') {
            $hygrothermograph = Yii::createObject([
                'class'         => Hygrothermograph::class,
                'log_id'        => $log->id,
                'temperature'   => $this->temperature,
                'humidity'      => $this->humidity,
            ]);
            if (!$hygrothermograph->validate() || !$hygrothermograph->save()) {
                return false;
            }
        }

        if ($this->pressure != '') {
            $barometer = Yii::createObject([
                'class'         => Barometer::class,
                'log_id'        => $log->id,
                'pressure'      => $this->pressure,
            ]);
            if (!$barometer->validate() || !$barometer->save()) {
                return false;
            }
        }

        return $log;
    }
}
