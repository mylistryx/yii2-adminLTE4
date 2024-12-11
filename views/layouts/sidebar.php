<?php
/**
 * @var View $this
 */

use yii\adminlte4\Menu;
use yii\web\View;

?>

<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link--> <a href="/" class="brand-link">

            <!--begin::Brand Image-->
            <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->

            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->

        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <!--begin::Sidebar Menu-->
            <?= Menu::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index'], 'icon' => 'home'],
                    [
                        'label' => 'Dashboard',
                        'icon'  => 'dashboard',
                        'items' => [
                            [
                                'label' => 'Link 1',
                                'icon'  => 'user',
                                'url'   => ['index'],
                            ],
                            [
                                'label' => 'Link with badge',
                                'icon'  => 'home',
                                'url'   => ['index2'],
                                'badge' => '<span class="nav-badge badge text-bg-info me-3">6</span>',
                            ],
                        ],
                    ],
                    [
                        'label'          => 'Multilevel menu',
                        'icon'           => 'user',
                        'iconClassAdded' => 'text-warning',
                        'items'          => [
                            ['label' => 'Level 1', 'icon' => 'circle', 'url' => ['/level1']],
                            [
                                'label' => 'Level 2',
                                'icon'  => 'circle',
                                'items' => [
                                    ['label' => 'Level 2.1', 'icon' => 'circle', 'url' => ['/level2/level1']],
                                    ['label' => 'Level 2.2', 'icon' => 'circle', 'url' => ['/level2/level1']],
                                    [
                                        'label' => 'Level 2.3',
                                        'icon'  => 'pencil',
                                        'items' => [
                                            ['label' => 'Level 2.3.1', 'icon' => 'circle', 'url' => ['/level2/level1']],
                                            ['label' => 'Level 2.3.2', 'icon' => 'circle', 'url' => ['/level2/level1']],
                                            ['label' => 'Level 2.3.3', 'icon' => 'circle', 'url' => ['/level2/level1']],
                                            [
                                                'label' => 'Level 2.3.4',
                                                'icon'  => 'circle',
                                                'url'   => ['/level2/level1'],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            ['label' => 'Level 3', 'icon' => 'circle', 'url' => ['/level3']],
                        ],
                    ],

                    [
                        'label' => 'Base elements',
                        'items' => [
                            ['label' => 'Buttons', 'url' => ['/demo/buttons/index']],
                            ['label' => 'Tables', 'url' => ['/demo/tables/index']],
                        ],
                    ],

                    [
                        'label' => 'Widgets',
                        'items' => [
                            ['label' => 'Accordion', 'url' => ['/demo/widgets/accordion']],
                            ['label' => 'ActiveField', 'url' => ['/demo/widgets/active-field']],
                            ['label' => 'ActiveForm', 'url' => ['/demo/widgets/active-form']],
                            ['label' => 'Alert', 'url' => ['/demo/widgets/alert']],
                        ],
                    ],

                    [
                        'label' => 'Labels',
                        'items' => [
                            ['label' => 'Info', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Success', 'iconClassAdded' => 'text-success'],
                            ['label' => 'Danger', 'iconClassAdded' => 'text-danger'],
                            ['label' => 'Warning', 'iconClassAdded' => 'text-warning'],
                            ['label' => 'Light', 'iconClassAdded' => 'text-light'],
                            ['label' => 'Dark', 'iconClassAdded' => 'text-dark'],
                            ['label' => 'Primary', 'iconClassAdded' => 'text-primary'],
                            ['label' => 'Secondary', 'iconClassAdded' => 'text-secondary'],
                        ],
                    ],

                    [
                        'label'  => '<b>HEADER EXAMPLE</b>',
                        'header' => true,
                    ],
                ],
                'encodeLabels' => false,
            ]) ?>
            <!--end::Sidebar Menu-->

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
