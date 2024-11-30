<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\MetalRate\MetalRate;

final class MetalRateController extends CrudController
{
    public string $modelClass = MetalRate::class;
}