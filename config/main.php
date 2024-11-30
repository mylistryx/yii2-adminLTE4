<?php

use yii\caching\FileCache;
use yii\i18n\PhpMessageSource;
use yii\web\User;
use yii\web\View;

$config = [
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [],
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => PhpMessageSource::class,
                ],
                'models*' => [
                    'class' => PhpMessageSource::class,
                    'fileMap' => [
                        'Identity' => '/models/Identity.php',
                    ]
                ]
            ],
        ],
        'view' => [
            'class' => View::class,
        ],
        'user' => [
            'class' => User::class,
            'loginUrl' => ['/auth/login'],
        ],
    ],
    'params' => array_merge(
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php',
    ),
];

return $config;