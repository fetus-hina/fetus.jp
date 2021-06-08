<?php

declare(strict_types=1);

namespace app\models;

use yii\base\BaseObject;
use yii\web\IdentityInterface;

/**
 * @codeCoverageIgnore
 */
final class User extends BaseObject implements IdentityInterface
{
    public ?string $id;
    public ?string $username;
    public ?string $password;
    public ?string $authKey;
    public ?string $accessToken;

    public static function findIdentity($id)
    {
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }
}
