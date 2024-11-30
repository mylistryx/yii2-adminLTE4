<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\Gem\Gem;

final class GemController extends CrudController
{
    public string $modelClass = Gem::class;
}