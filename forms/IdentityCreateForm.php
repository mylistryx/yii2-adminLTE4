<?php

namespace app\forms;

use app\components\forms\Form;
use Yii;

class IdentityCreateForm extends Form
{

    public ?string $email = null;
    public ?string $phone = null;
    public ?string $name = null;
    public ?string $surname = null;
    public ?string $patronymic = null;
    public ?string $birthday = null;
    public ?string $password = null;
    public ?int $current_status = null;
    public ?int $identity_type = null;

    public function rules(): array
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'birthday' => Yii::t('app', 'Birthday'),
            'password' => Yii::t('app', 'Password'),
            'current_status' => Yii::t('app', 'Current Status'),
            'identity_type' => Yii::t('app', 'Identity Type'),
        ];
    }
}