<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\CurrencyRate\CurrencyRate;

final class CurrencyRateController extends CrudController
{
    public string $modelClass = CurrencyRate::class;
}