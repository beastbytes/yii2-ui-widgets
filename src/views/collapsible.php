<?php
/**
 * collapsible view
 *
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */

use yii\helpers\Html;
use BeastBytes\UiWidgets\Collapsible;

/** @var Collapsible $widget */

echo Html::beginTag('div', $widget->options);
echo Html::checkbox("ui-collapsible__control-<?= $widget->id ?>", false, [
    'class' => 'ui-collapsible__control',
    'id' => "ui-collapsible__control-$widget->id"
]);
echo Html::tag('label', '', $widget->buttonOptions);
echo Html::tag('div', $widget->content, $widget->contentOptions);
echo Html::endTag('div');
