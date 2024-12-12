<?php

use app\modules\demo\AdminLte4DemoModule;
use yii\caching\FileCache;
use yii\i18n\PhpMessageSource;
use yii\symfonymailer\Mailer;
use yii\web\User;

$config = [
    'language'   => 'ru-RU',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => [
        'log',
        'demo',
    ],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules'    => [
        'demo' => [
            'class' => AdminLte4DemoModule::class,
        ],
    ],
    'components' => [
        'cache'  => [
            'class' => FileCache::class,
        ],
        'i18n'   => [
            'translations' => [
                '*'       => [
                    'class' => PhpMessageSource::class,
                ],
                'models*' => [
                    'class'   => PhpMessageSource::class,
                    'fileMap' => [
                        'Identity' => '/models/Identity.php',
                    ],
                ],
            ],
        ],
        'user'   => [
            'class'    => User::class,
            'loginUrl' => ['/auth/login'],
        ],
        'mailer' => [
            'class'            => Mailer::class,
            'viewPath'         => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
    ],
    'params'     => array_merge(
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php',
    ),
];

return $config;