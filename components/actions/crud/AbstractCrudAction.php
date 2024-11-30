<?php

namespace app\components\actions\crud;

use app\components\actions\Action;

abstract class AbstractCrudAction extends Action
{
    public ?string $modelClass = null;
    public ?string $scenario = null;
    public ?string $view = null;
    public array $options = [];
}