<?php

/**
 * @var View $this
 * @var string $content
 */

use app\assets\AppAsset;
use yii\adminlte4\Html;
use yii\web\View;

$mainAsset = AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-open">
<?php $this->beginBody() ?>
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
            <?= $this->render('navbarStart') ?>
            <?= $this->render('navbarEnd') ?>
        </div>
        <!--end::Container-->
    </nav>
    <!--end::Header-->


    <?= $this->render('sidebar') ?>

    <?= $this->render('content', [
        'content' => $content,
    ]) ?>

    <?= $this->render('footer') ?>

</div>

<!--end::App Wrapper-->
<?php $this->endBody() ?>
</body>
<!--end::Body-->


</html>
<?php $this->endPage() ?>
