<?php
namespace app\models;

use Yii;
use app\behaviors\TimestampBehavior;
use jp3cki\uuid\Uuid;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

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
class Sensor extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key',
                ],
                'value' => function ($event) {
                    return Uuid::v4()->__toString();
                },
            ],
        ];
    }

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
            [['name'], 'required'],
            [['auth_key'], 'string'],
            [['enabled'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
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
