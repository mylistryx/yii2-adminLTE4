<?php

namespace app\components\controllers;

use app\components\actions\crud\CreateAction;
use app\components\actions\crud\DeleteAction;
use app\components\actions\crud\IndexAction;
use app\components\actions\crud\UpdateAction;
use app\components\actions\crud\ViewAction;
use app\components\interfaces\ModelCrudInterface;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

abstract class CrudController extends WebController
{
    public string $modelClass;
    public array $options = [
        'create' => [
            'goBackAction' => 'view',
        ],
        'update' => [
            'goBackAction' => 'view',
        ],
    ];

    public function behaviors(): array
    {
        return [
            'Access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'Verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions(): array
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => $this->modelClass,
                'view' => 'index',
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => $this->modelClass,
                'scenario' => Model::SCENARIO_DEFAULT,
                'view' => 'create',
                'options' => $this->options['create'] ?? [],
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => $this->modelClass,
                'scenario' => Model::SCENARIO_DEFAULT,
                'view' => 'update',
                'options' => $this->options['update'] ?? [],
            ],
            'view' => [
                'class' => ViewAction::class,
                'modelClass' => $this->modelClass,
                'view' => 'view',
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => $this->modelClass,
            ],
        ];
    }

    /**
     * @throws NotFoundHttpException
     */
    public function findModel(int $id): ActiveRecord
    {
        /** @var ModelCrudInterface $modelClass */
        $modelClass = $this->modelClass;
        $model = $modelClass::findOne($id);
        if (null === $model) {
            throw new NotFoundHttpException('Not found');
        }
        return $model;
    }
}