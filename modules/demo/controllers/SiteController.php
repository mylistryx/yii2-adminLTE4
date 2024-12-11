<?php

namespace app\modules\demo\controllers;

use app\components\controllers\WebController;
use yii\web\Response;

final class SiteController extends WebController
{
    public function actionIndex(): Response
    {
        return $this->render('index');
    }
}