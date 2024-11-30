<?php
/**
 * @var View $this
 * @var Identity $model
 */

use app\models\Identity\Identity;
use yii\web\View;

$this->params['breadcrumbs'][] = ['label' => $model->indexTitle, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = 'Добавление записи';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
