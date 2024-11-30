<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\enums\IdentityType;
use app\models\Identity\Identity;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;

final class IdentityController extends CrudController
{
    /**
     * @throws ForbiddenHttpException
     * @throws BadRequestHttpException
     */
    public function beforeAction($action): bool
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->type != IdentityType::Administrator->value) {
            throw new ForbiddenHttpException();
        }
        return parent::beforeAction($action);
    }
    public string $modelClass = Identity::class;
}