<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\adminlte4\AdminLTE4Asset;
use yii\adminlte4\AdminLTE4PluginAsset;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\fontawesome\assets\FontAwesomeAsset;
use yii\OverlayScrollbars\assets\OverlayScrollbarsAsset;
use yii\SourceSans3\assets\SourceSans3Asset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/site.js',
    ];
    public $depends = [
        YiiAsset::class,
        AdminLTE4Asset::class,
        AdminLTE4PluginAsset::class,

        SourceSans3Asset::class,
        FontAwesomeAsset::class,

        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        BootstrapIconAsset::class,

        OverlayScrollbarsAsset::class,
    ];
}
