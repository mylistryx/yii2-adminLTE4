<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\GemRate\GemRate;

final class GemRateController extends CrudController
{
    public string $modelClass = GemRate::class;
}