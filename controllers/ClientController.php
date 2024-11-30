<?php

namespace app\controllers;

use app\components\controllers\CrudController;
use app\models\Client\Client;

final class ClientController extends CrudController
{
    public string $modelClass = Client::class;
}