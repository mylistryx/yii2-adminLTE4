<?php

namespace app\traits;

use Yii;
use yii\helpers\ArrayHelper;

trait CreateMultiple
{
    /**
     * @param string $modelClass
     * @param array $multipleModels
     * @param string $pk
     * @return array
     */
    public static function createMultiple(string $modelClass, array $multipleModels = [], string $pk = 'id'): array
    {
        $model = new $modelClass;
        $formName = $model->formName();
        $post = Yii::$app->request->post($formName);
        $models = [];

        if (!empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, $pk, $pk));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item[$pk]) && !empty($item[$pk]) && isset($multipleModels[$item[$pk]])) {
                    $models[] = $multipleModels[$item[$pk]];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}