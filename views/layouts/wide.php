<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use app\assets\AppAsset;
use app\enums\IdentityType;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
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
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            '<div class="d-flex">' . Html::a('Создать расчет', ['/calculation/create'], ['class' => 'btn btn-outline-success']) . '</div>',
            ['label' => 'База расчетов', 'url' => ['/calculation/index'], 'active' => Yii::$app->controller->id == 'calculation'],
            [
                'label' => 'Справочники',
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => ['/identity/index'],
                        'active' => Yii::$app->controller->id == 'identity',
                        'visible' => Yii::$app->user->identity->type == IdentityType::Administrator->value,
                    ],
                    ['label' => 'Валюты', 'url' => ['/currency/index'], 'active' => Yii::$app->controller->id == 'currency'],
                    ['label' => 'Камни', 'url' => ['/gem/index'], 'active' => Yii::$app->controller->id == 'gem'],
                    ['label' => 'Металлы', 'url' => ['/metal/index'], 'active' => Yii::$app->controller->id == 'metal'],
                    ['label' => 'Виды работ', 'url' => ['/work/index'], 'active' => Yii::$app->controller->id == 'work'],
                    ['label' => 'Клиенты', 'url' => ['/client/index'], 'active' => Yii::$app->controller->id == 'client'],
                ],
            ],
            [
                'label' => 'Курсы',
                'items' => [
                    ['label' => 'Курсы валют', 'url' => ['/currency-rate/index'], 'active' => Yii::$app->controller->id == 'currencyRate'],
                    ['label' => 'Курсы металлов', 'url' => ['/metal-rate/index'], 'active' => Yii::$app->controller->id == 'metalRate'],
                    ['label' => 'Курсы Камней', 'url' => ['/gem-rate/index'], 'active' => Yii::$app->controller->id == 'gemRate'],
                ],
            ],
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
            ['label' => 'Login', 'url' => ['/auth/login'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Logout', 'url' => ['/auth/logout'], 'visible' => !Yii::$app->user->isGuest, 'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
    </div>
    <div class="container-fluid">
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
