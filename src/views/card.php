<?php
/**
 * card view
 *
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */

use yii\helpers\Html;
use BeastBytes\UiWidgets\Card;

/** @var Card $widget */

echo Html::tag('div', $this->render('_card', compact('widget')), $widget->options);
