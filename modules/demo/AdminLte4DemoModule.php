<?php

namespace app\modules\demo;

use yii\AdminLTE4\assets\AdminLTE4Asset;
use yii\base\BootstrapInterface;
use yii\base\Module;

class AdminLte4DemoModule extends Module implements BootstrapInterface
{
    public function bootstrap($app)
    {
//        $app->getView()->registerAssetBundle(AdminLte4Asset::class);
        $app->params['breadcrumbs'][] = ['url' => ['/demo/site/index'], 'label' => 'Демонстрация AdminLTE4'];
    }
}