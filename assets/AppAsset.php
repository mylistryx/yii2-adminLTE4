<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\AdminLTE4\AdminLTE4Asset;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
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
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.min.css',
        'https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@latest/index.css',
        'https://cdn.jsdelivr.net/npm/overlayscrollbars@latest/styles/overlayscrollbars.min.css',
        [
            'source-dev' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.js',
            'source-min' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js',
            'integrity' => 'sha512-uNrBiKhFm8UOf0IXqkeojIesJ5glWJt8+epL5xwBBe1J9tcmd54f/vwQ6+g2ahXBHuayqaQcelUK7CULdWHinQ==',
            'crossorigin' => 'anonymous',
            'referrer-policy' => 'no-referrer',
        ],
        'css/site.css',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/overlayscrollbars@latest/browser/overlayscrollbars.browser.es6.min.js',
        'https://cdn.jsdelivr.net/npm/@popperjs/core@latest/dist/umd/popper.min.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        JqueryAsset::class,
        AdminLTE4Asset::class,
        BootstrapPluginAsset::class,
    ];
}
