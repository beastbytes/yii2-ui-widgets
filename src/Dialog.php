<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\web\View;

/**
 * CSS only Modal widget.
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
class Dialog extends Card
{
    /**
     * @var string|null|boolean $assetBundle Fully qualified class name of the widget's CSS asset bundle; this should
     * depend on the default asset bundle to inherit the widget behaviour.
     * If `null` the default asset bundle is published. If `false` no asset bundle is published.
     */
    /**
     * @var string $content Dialog content. If `null` the content between Dialog::begin() and Dialog::end() calls is used
     */
    /**
     * @var $encodeTitle boolean Whether the title should be HTML-encoded.
     */
    /**
     * @var array $options HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    /**
     * @var string $title Title of the dialog. If empty no title is rendered
     */
    /**
     * @var array $titleOptions HTML attributes for the widget title
     * The title always has the `class` "ui-card__title"
     */
    /**
     * @var string Label for the dialog; when this is clicked the dialog is shown
     */
    public $label;
    /**
     * @var array HTML options for the label. The label will always be given the `class` "ui-dialog-open"
     * and the `for` attribute will be set
     */
    public $labelOptions = [];
    /**
     * @var boolean Whether the dialog is modal
     */
    public $modal = true;

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (empty($this->label)) {
            throw new InvalidConfigException("'label' is required.");
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        Html::removeCssClass($this->options, 'ui-dialog');
        Html::addCssClass($this->options, 'ui-dialog__dialog');
        Html::addCssClass($this->contentOptions, 'ui-dialog__content');
        Html::addCssClass($this->footerOptions, 'ui-dialog__footer');
        Html::addCssClass($this->labelOptions, 'ui-dialog-open');
        Html::addCssClass($this->titleOptions, 'ui-dialog__title');
        $this->labelOptions['for'] = 'ui-dialog__control-' . $this->id;

        $this->view->on(View::EVENT_END_BODY, function () {
            echo $this->render('dialog', ['widget' => $this]);
        });
        return Html::tag('label', $this->label, $this->labelOptions);
    }
}
