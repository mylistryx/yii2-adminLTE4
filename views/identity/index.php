<?php
/**
 * @var View $this
 * @var IdentitySearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

use app\enums\IdentityStatus;
use app\enums\IdentityType;
use app\models\Identity\IdentitySearch;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\web\View;

$this->title = $searchModel->indexTitle;

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="list">
    <div class="row">
        <div class="col-12 mb-3">
            <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],
            'name',
            'surname',
            'patronymic',
            'email:email',
            'phone',
            [
                'attribute' => 'status',
                'value' => fn($model) => IdentityStatus::getLabel($model->status),
                'filter' => Html::activeDropDownList($searchModel, 'status', ['' => 'Все'] + IdentityStatus::arrayForDropdown(), ['class' => 'form-control']),
            ],
            [
                'attribute' => 'type',
                'value' => fn($model) => IdentityType::getLabel($model->type),
                'filter' => Html::activeDropDownList($searchModel, 'type', ['' => 'Все'] + IdentityType::arrayForDropdown(), ['class' => 'form-control']),
            ],
            ['class' => ActionColumn::class],
        ],
    ]) ?>
</div>
