<?php

namespace app\modules\demo\controllers;

use app\components\controllers\WebController;
use yii\web\Response;

final class CardController extends WebController
{
    public function actionIndex(): Response
    {
        return $this->render('index');
    }
}