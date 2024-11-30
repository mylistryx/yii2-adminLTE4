<?php

namespace app\traits;

use yii\base\NotSupportedException;

trait IdentityTrait
{

    public static function findIdentity($id): static
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): static
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }
}