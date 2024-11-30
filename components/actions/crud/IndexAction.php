<?php

namespace app\components\actions\crud;

use yii\web\Response;

class IndexAction extends AbstractCrudAction
{
    public ?string $searchModelClass = null;

    public function init(): void
    {
        parent::init();
        if ($this->searchModelClass === null) {
            $this->searchModelClass = $this->modelClass . 'Search';
        }
    }

    public function run(): Response
    {
        $className = $this->searchModelClass;
        $searchModel = new $className();
        $dataProvider = $searchModel->search($this->controller->queryParams());

        return $this->controller->render($this->view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}