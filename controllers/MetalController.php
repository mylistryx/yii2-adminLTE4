<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\Metal\Metal;

final class MetalController extends CrudController
{
    public string $modelClass = Metal::class;
}