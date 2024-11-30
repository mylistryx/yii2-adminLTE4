<?php
/**
 * @var View $this
 * @var Identity $model
 * @var ActiveForm $form
 */

use app\enums\IdentityStatus;
use app\enums\IdentityType;
use app\models\Identity\Identity;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

?>
<div class="container">
    <div class="title">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?php
    $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'status')->dropDownList(IdentityStatus::arrayForDropdown()) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'type')->dropDownList(IdentityType::arrayForDropdown()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'user@example.com']) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'phone')->textInput()->widget(MaskedInput::class, [
                'mask' => '+7 (999) 999-9999',
            ]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'surname')->textInput(['placeholder' => 'Иванов']) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Иван']) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'patronymic')->textInput(['placeholder' => 'Иванович']) ?>
        </div>
    </div>
    <?= Html::submitButton(Yii::t('buttons', $model->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-success']) ?>
    <?php
    ActiveForm::end() ?>
</div>
