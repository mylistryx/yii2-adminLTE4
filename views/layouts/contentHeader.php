<?php
/**
 * @var $this View;
 */

use yii\adminlte4\Breadcrumbs;
use yii\adminlte4\Html;
use yii\web\View;

?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">
                    <?= Html::encode($this->title) ?>
                </h3>
            </div>
            <div class="col-sm-6">
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->