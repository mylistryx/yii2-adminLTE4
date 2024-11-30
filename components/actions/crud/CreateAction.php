<?php

namespace app\components\actions\crud;

use app\components\db\ActiveRecord;
use yii\db\Exception;
use yii\web\Response;

class CreateAction extends AbstractCrudAction
{
    /**
     * @throws Exception
     */
    public function run(): Response|string
    {
        $modelClass = $this->modelClass;
        $model = new $modelClass();

        /** @var ActiveRecord $model */
        if ($model->load($this->controller->post()) && $model->save()) {
            $goBackAction = $this->options['goBackAction'] ?? 'view';
            $goBackParams = $this->options['goBackParams'] ?? [];

            return $this->controller->redirect([$goBackAction, 'id' => $model->id, ...$goBackParams]);
        }

        if ($model->hasErrors()) {
            var_dump($model->getErrors());
            die();
        }

        return $this->controller->render($this->view, [
            'model' => $model,
        ]);
    }
}