<?php

namespace app\components\actions\crud;

use app\components\db\ActiveRecord;
use Throwable;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class UpdateAction extends AbstractCrudAction
{
    /**
     * @throws NotFoundHttpException
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function run($id): Response
    {
        /** @var ActiveRecord $model */
        $model = $this->controller->findModel($id);

        if ($model->load($this->controller->post()) && $model->save()) {
            $goBackAction = $this->options['goBackAction'] ?? 'view';
            $goBackParams = $this->options['goBackParams'] ?? [];

            return $this->controller->redirect([$goBackAction, 'id' => $model->id, ...$goBackParams]);
        }

        return $this->controller->render($this->view, [
            'model' => $model,
        ]);
    }
}