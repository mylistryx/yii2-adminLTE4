<?php

use yii\db\Connection;

$config = [
    'components' => [
        'db' => [
            'class' => Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=dbname',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8mb4',

            'enableSchemaCache' => false,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
    ],
];

return $config;