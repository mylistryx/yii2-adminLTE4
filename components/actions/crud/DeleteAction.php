<?php

namespace app\components\actions\crud;

use Throwable;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DeleteAction extends AbstractCrudAction
{
    /**
     * @throws StaleObjectException
     * @throws Throwable
     * @throws NotFoundHttpException
     */
    public function run($id): Response
    {
        $model = $this->controller->findModel($id);
        $model->delete();

        return $this->controller->redirect(['index']);
    }
}