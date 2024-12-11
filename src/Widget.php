<?php

declare(strict_types=1);

namespace yii\adminlte4;

/**
 * \yii\adminlte4\Widget is the base class for all adminlte4 widgets.
 */
class Widget extends \yii\base\Widget
{
    use AdminLTE4WidgetTrait;

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see Html::renderTagAttributes for details on how attributes are being rendered.
     */
    public $options = [];
}