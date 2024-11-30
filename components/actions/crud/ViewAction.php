<?php

namespace app\components\actions\crud;

use yii\web\NotFoundHttpException;
use yii\web\Response;

class ViewAction extends AbstractCrudAction
{
    /**
     * @throws NotFoundHttpException
     */
    public function run(int $id): Response
    {
        $model = $this->controller->findModel($id);

        return $this->controller->render($this->view, [
            'model' => $model,
        ]);
    }
}