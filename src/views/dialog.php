<?php
/**
 * dialog view
 *
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */

use yii\helpers\Html;
use BeastBytes\UiWidgets\Dialog;

/** @var Dialog $widget */

echo Html::beginTag('div', ['class' => 'ui-dialog', 'id' => "ui-dialog-$widget->id"]);
echo Html::checkbox("ui-dialog__control-$widget->id", false, [
    'class' => 'ui-dialog__control',
    'id' => "ui-dialog__control-$widget->id"
]);

if ($widget->modal) {
    echo Html::tag('label', '', [
        'class' => 'ui-dialog__overlay',
        'for' => "ui-dialog__control-$widget->id"
    ]);
}

echo Html::beginTag('div', $widget->options);
echo Html::tag('label', '', [
    'class' => 'ui-dialog__close',
    'for' => "ui-dialog__control-$widget->id"
]);
echo $this->render('_card', compact('widget'));
echo Html::endTag('div');
echo Html::endTag('div');
