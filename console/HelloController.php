<?php

namespace app\console;

use app\components\controllers\ConsoleController;
use yii\console\ExitCode;

class HelloController extends ConsoleController
{
    public function actionIndex(string $message = 'Hello world'): int
    {
        $this->stdout($message . PHP_EOL);

        return ExitCode::OK;
    }
}
