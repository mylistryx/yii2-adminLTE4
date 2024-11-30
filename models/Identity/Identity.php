<?php

namespace app\models\Identity;

use app\components\db\ActiveRecord;
use app\enums\IdentityStatus;
use app\enums\Tables;
use app\traits\IdentityTrait;
use Yii;
use yii\base\Exception;
use yii\web\IdentityInterface;

/**
 * @inheritDoc
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $password_hash
 * @property string $auth_key
 * @property int $status
 * @see self::getFullName()
 * @see self::setFullName($fullName)
 * @property string $fullName
 * @see self::getPassword()
 * @see self::setPassword($password)
 * @property string $password
 * @see self::getIndexTitle()
 * @property-read string $indexTitle
 */
class Identity extends ActiveRecord implements IdentityInterface
{
    use IdentityTrait;

    public static function tableName(): string
    {
        return Tables::Identity->value;
    }

    public static function find(): IdentityQuery
    {
        return new IdentityQuery(static::class);
    }

    /**
     * @throws Exception
     */
    public function rules(): array
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['email', 'phone', 'surname', 'name'], 'required'],
            ['email', 'email'],
            ['phone', 'string', 'max' => 20],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['surname', 'string', 'min' => 2, 'max' => 50],
            ['patronymic', 'string', 'min' => 2, 'max' => 50, 'skipOnEmpty' => true],
            ['password', 'string', 'min' => Yii::$app->params['password.MinLength'], 'max' => Yii::$app->params['password.MaxLength']],
            ['status', 'in', 'range' => IdentityStatus::values()],
            ['auth_key', 'default', 'value' => Yii::$app->security->generateRandomString()],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('models/Identity', 'ID'),

            'username' => Yii::t('models/Identity', 'Username'),
            'email'    => Yii::t('models/Identity', 'Email'),
            'phone'    => Yii::t('models/Identity', 'Phone'),

            'name'       => Yii::t('models/Identity', 'Name'),
            'surname'    => Yii::t('models/Identity', 'Surname'),
            'patronymic' => Yii::t('models/Identity', 'Patronymic'),
            'fullName'   => Yii::t('models/Identity', 'Full name'),

            'status'   => Yii::t('models/Identity', 'Status'),
            'password' => Yii::t('models/Identity', 'Password'),
        ];
    }

    public function getPassword(): null
    {
        return null;
    }

    /**
     * @throws Exception
     */
    public function setPassword(?string $password = null): void
    {
        if (empty($password)) {
            return;
        }

        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function getFullName(): string
    {
        return trim(implode(' ', [$this->surname, $this->name, $this->patronymic]));
    }

    public function setFullName(string $fullName): void
    {
        [$this->surname, $this->name, $this->patronymic] = explode(' ', $fullName);
    }

    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}