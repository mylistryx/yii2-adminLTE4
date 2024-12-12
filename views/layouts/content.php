<?php

/**
 * @var $this View
 * @var $content string
 */

use yii\web\View;

?>
<!--begin::App Main-->
<main class="app-main">

    <?= $this->render('contentHeader') ?>

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->