<?php
/**
 * @var $this View
 */

use yii\adminlte4\BI;
use yii\adminlte4\FA;
use yii\adminlte4\Nav;
use yii\web\View;

?>

<!--begin::Start Navbar Links-->
<?= Nav::widget([
    'items'        => [
        ['label' => BI::i('list'), 'url' => '#', 'options' => ['data-lte-toggle' => 'sidebar', 'role' => 'button']],
        ['label' => FA::i('home me-1') . 'Home', 'url' => ['/site/index']],
        ['label' => FA::i('pencil me-1') . 'Contacts', 'url' => ['/site/contacts']],
    ],
    'encodeLabels' => false,
    'options'      => ['class' => 'navbar-nav'],
]) ?>
<!--end::Start Navbar Links-->