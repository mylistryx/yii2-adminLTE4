<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\Work\Work;

final class WorkController extends CrudController
{
    public string $modelClass = Work::class;
}