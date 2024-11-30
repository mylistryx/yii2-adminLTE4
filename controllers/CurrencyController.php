<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\Currency\Currency;

final class CurrencyController extends CrudController
{
    public string $modelClass = Currency::class;
}