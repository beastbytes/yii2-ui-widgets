<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * CSS only Accordion widget
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
class Accordion extends UiWidget
{
    /**
     * @var string|null|boolean $assetBundle Fully qualified class name of the widget's CSS asset bundle; this should
     * depend on the default asset bundle to inherit the widget behaviour.
     * If `null` the default asset bundle is published. If `false` no asset bundle is published.
     */
    /**
     * @var array $options HTML attributes for the widget container tag. The
     * following special option is recognized:
     *
     * - single: boolean, Optional. Defaults to `true`. If `true` only one section of the accordion can be expanded; if `false` sections can be expanded and collapsed individually
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    /**
     * @var boolean Whether the labels should be HTML-encoded.
     */
    public $encodeLabels = true;
    /**
     * @var array list of collapsible items. Each item is an array of the
     * following structure:
     *
     ~~~
     [
        'label' => 'Item label',
        'content' => 'Item content',
        'expanded' => true|false, // Optional. Whether this item is initially expanded.
        'enabled' => true|false, // Optional. Whether this item can be expanded; defaults to `true`,
        'labelOptions' => [], // Optional. HTML attributes for the label. Merged with [[labelOptions]]
        'panelOptions' => [], // Optional. HTML attributes for the panel. Merged with [[panelOptions]]
     ]
     ~~~
     */
    public $items = [];
    /**
     * @var array HTML attributes for section labels
     * Labels always have the `class` "ui-accordion__label" and will have the `for` attribute set
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    public $labelOptions = [];
    /**
     * @var array HTML attributes for tab panels
     * Panels always have the `class` "ui-accordion__panel"
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    public $panelOptions = [];

    private $_single;

    public function init()
    {
        parent::init();
        $this->_single = ArrayHelper::remove($options, 'single', true);
    }

    /**
     * Renders the widget.
     *
     * @return string the rendering result.
     * @throws InvalidConfigException
     */
    public function run()
    {
        return Html::tag('div', $this->renderItems(), $this->options);
    }

    /**
     * Renders accordion items as specified by [[items]]
     *
     * @return string the rendering result.
     * @throws InvalidConfigException.
     */
    protected function renderItems()
    {
        $items = [];

        foreach ($this->items as $i => $item) {
            if (!array_key_exists('label', $item)) {
                throw new InvalidConfigException("The 'label' option is required for item $i.");
            }
            if (!array_key_exists('content', $item)) {
                throw new InvalidConfigException("The 'content' option is required for item $i.");
            }

            $itemId = $this->id . "-$i";

            $labelOptions = ArrayHelper::merge(
                $this->labelOptions,
                ArrayHelper::getValue($item, 'labelOptions', []),
                ['class' => 'ui-accordion__label', 'for' => "ui-accordion-control-$itemId"]
            );

            $panelOptions = ArrayHelper::merge(
                $this->panelOptions,
                ArrayHelper::getValue($item, 'panelOptions', []),
                ['class' => 'ui-accordion__panel']
            );

            $control = ($this->_single ? 'radio' : 'checkbox');
            $items[] =
                Html::$control($this->id, ArrayHelper::remove($items, 'expanded', false), [
                    'class' => 'ui-accordion__control',
                    'id' => "ui-accordion-control-$itemId",
                    'disabled' => ArrayHelper::getValue($item, 'enabled', false)
                ]) .
                Html::tag(
                    'label',
                    $this->encodeLabels ? Html::encode($item['label']) : $item['label'],
                    $labelOptions
                ) .
                Html::tag('div', $item['content'], $panelOptions)
            ;
        }

        return join('', $items);
    }
}
