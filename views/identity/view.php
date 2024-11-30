<?php
/**
 * @var View $this
 * @var Identity $model
 */

use app\enums\IdentityStatus;
use app\enums\IdentityType;
use app\models\Identity\Identity;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => $model->indexTitle, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = "Просмотр записи #" . $model->id;
?>
<div class="view">
    <idv class="row">
        <div class="col-12 mb-3">
            <?= Html::a(Yii::t('buttons', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('buttons', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'method' => 'post',
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                ],
            ]) ?>
        </div>
    </idv>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
            'phone',
            'fullName',
            [
                'attribute' => 'status',
                'value' => fn($model) => IdentityStatus::getLabel($model->status),
            ],
            [
                'attribute' => 'type',
                'value' => fn($model) => IdentityType::getLabel($model->type),
            ],
        ],
    ]) ?>
</div>