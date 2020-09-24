<?php
/**
 * _card partial view
 *
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */

use yii\helpers\Html;
use BeastBytes\UiWidgets\Card;
use BeastBytes\UiWidgets\Dialog;

/** @var Card|Dialog $widget */

if (!empty($widget->title)):
    echo Html::tag(
        'div',
        ($widget->encodeTitle ? Html::encode($widget->title) : $widget->title),
        $widget->titleOptions
    );
endif;

echo Html::tag('div', $widget->content, $widget->contentOptions);

if (!empty($widget->footer)):
    echo Html::tag('div', $widget->footer, $widget->footerOptions);
endif;
