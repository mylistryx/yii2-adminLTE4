<?php

namespace yii\adminlte4;

use yii\web\AssetBundle;

class AdminLTE4Asset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/dist';

    public $css = [
        "css/adminlte.min.css",
    ];
}