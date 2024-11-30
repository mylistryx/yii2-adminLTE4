<?php

use app\enums\IdentityStatus;
use app\enums\IdentityType;
use app\enums\Tables;
use yii\db\Expression;
use yii\db\Migration;

class m241119_193723_create_table_identity extends Migration
{
    /**
     * @throws \yii\base\Exception
     */
    public function safeUp(): void
    {
        $this->createTable(Tables::Identity->value, [
            'id' => $this->primaryKey(),

            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull()->unique(),

            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'patronymic' => $this->string()->null(),

            'status' => $this->integer()->notNull()->notNull()->defaultValue(IdentityStatus::defaultValue()->value),

            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull()->unique(),

            'created_at' => $this->dateTime()->notNull()->defaultValue(new Expression('NOW()')),
        ]);

        $this->createIndex('idx-identity-status', Tables::Identity->value, 'status');

        $this->batchInsert(Tables::Identity->value, [
            'id',
            'username',
            'email',
            'phone',
            'surname',
            'name',
            'patronymic',
            'status',
            'password_hash',
            'auth_key',
        ], [
            1 => [
                1,
                'admin',
                'admin@example.com',
                '+7 (999) 123-4567',
                'Встроенная',
                'Учетная',
                'Запись',
                IdentityStatus::Active->value,
                Yii::$app->security->generatePasswordHash('admin'),
                Yii::$app->security->generateRandomString(),
            ],
        ]);
    }

    public function safeDown(): void
    {
        $this->dropTable(Tables::Identity->value);
    }
}
