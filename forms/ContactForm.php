<?php

namespace app\forms;

use app\components\forms\Form;
use Yii;

class ContactForm extends Form
{
    public ?string $name = null;
    public ?string $email = null;
    public ?string $subject = null;
    public ?string $body = null;
    public ?string $verifyCode = null;

    public function rules(): array
    {
        return [
            [['name', 'email', 'subject', 'body', 'verifyCode'], 'required'],
            ['name', 'string', 'length' => [2, 64]],
            ['subject', 'string', 'length' => [1, 255]],
            ['body', 'string', 'length' => [1, 65535]],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name'       => Yii::t('app', 'Name'),
            'email'      => Yii::t('app', 'Email'),
            'subject'    => Yii::t('app', 'Subject'),
            'body'       => Yii::t('app', 'Body'),
            'verifyCode' => Yii::t('app', 'Verify Code'),
        ];
    }

    public function send(string $adminEmail): bool
    {
        if ($this->validate()) {
            Yii::$app->mailer
                ->compose()
                ->setTo($adminEmail)
                ->setFrom([Yii::$app->params['app.senderEmail'] => Yii::$app->params['app.senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }

        return false;
    }
}