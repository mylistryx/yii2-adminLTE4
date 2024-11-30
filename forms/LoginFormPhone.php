<?php

namespace app\forms;

use app\components\forms\Form;
use app\models\Identity\Identity;
use Yii;

/**
 * @property-read Identity|false $identity
 */
class LoginFormPhone extends Form
{
    public ?string $username = null;
    public ?string $password = null;

    private Identity|null|false $identity = false;

    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            if (!$this->getIdentity() || !$this->identity->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect username or password'));
            }
        }
    }

    public function getIdentity(): Identity
    {
        if ($this->identity === false) {
            $this->identity = Identity::findOne([
                'username' => $this->username,
            ]);
        }

        return $this->identity;
    }

    public function login(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        return Yii::$app->user->login($this->getIdentity());
    }
}
