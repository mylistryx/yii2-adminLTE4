<?php

namespace app\components\forms;

use app\traits\CreateMultiple;
use yii\base\Model;

abstract class Form extends Model
{
    use CreateMultiple;
}