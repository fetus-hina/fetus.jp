<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use app\behaviors\TimestampBehavior;
use jp3cki\uuid\Uuid;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "sensor".
 *
 * @property integer $id
 * @property string $auth_key
 * @property string $auth_secret
 * @property string $name
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 *
 * @property SenseLog[] $senseLogs
 */
class Sensor extends ActiveRecord implements IdentityInterface
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
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_secret',
                ],
                'value' => function ($event) {
                    return \base64_encode(
                        \random_bytes(512 / 8)
                    );
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
            [['auth_key', 'auth_secret'], 'string'],
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
            'auth_secret' => 'Auth Secret',
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

    // IdentityInterface
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    // IdentityInterface
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    // IdentityInterface
    public function getId()
    {
        return $this->id;
    }

    // IdentityInterface
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    // IdentityInterface
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function toApiResponse(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
