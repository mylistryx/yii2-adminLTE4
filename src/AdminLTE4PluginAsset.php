<?php

namespace yii\adminlte4;

use yii\web\AssetBundle;

class AdminLTE4PluginAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/dist';

    public $js = [
        "js/adminlte.min.js",
    ];

    public $depends = [
        AdminLTE4Asset::class,
    ];
}