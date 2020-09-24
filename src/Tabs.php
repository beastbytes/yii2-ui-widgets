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
 * CSS only Tabs widget
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
class Tabs extends Accordion
{
    /**
     * @var string|null|boolean $assetBundle Fully qualified class name of the widget's CSS asset bundle; this should
     * depend on the default asset bundle to inherit the widget behaviour.
     * If `null` the default asset bundle is published. If `false` no asset bundle is published.
     */
    /**
     * @var array $options HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    /**
     * @var boolean $encodeLabels Whether the labels should be HTML-encoded.
     */
    /**
     * @var array $items list of tabbed items. Each item is an array of the following structure:
     *
     ~~~
     [
         'label' => 'Item label',
         'content' => 'Item content',
         'active' => true|false`, // Optional. Whether this tab is the initially active tab. If no tab is marked as active the first tab is the active tab. If more than one tab is marked as active the last is the active tab
         'enabled' => true|false`, // Optional. Whether this tab can be active; defaults to `true`,
         'labelOptions' => [], // Optional. HTML attributes for the label. Merged with [[labelOptions]]
         'panelOptions' => [], // Optional. HTML attributes for the panel. Merged with [[panelOptions]]
     ]
     ~~~
     */
    /**
     * @var array $labelOptions HTML attributes for tab labels
     * Labels always have the `class` "ui-tabs__label" and will have the `for` attribute set
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    /**
     * @var array $panelOptions HTML attributes for tab panels
     * Panels always have the `class` "ui-tabs__panel"
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */

    private $_activeTab = 0;

    /**
     * Initialises the widget
     */
    public function init()
    {
        parent::init();

        $enabledTab = null;

        foreach ($this->items as $i => $item) {
            if (ArrayHelper::remove($options, 'active', false)) {
                $this->_activeTab = $i;
            }
        }
    }

    /**
     * Renders tab items as specified by [[items]]
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
                ['class' => 'ui-tabs__label', 'for' => "ui-tab-control-$itemId"]
            );

            $panelOptions = ArrayHelper::merge(
                $this->panelOptions,
                ArrayHelper::getValue($item, 'panelOptions', []),
                ['class' => 'ui-tabs__panel']
            );

            $items[] =
                Html::radio($this->id, $this->_activeTab === $i, [
                    'class' => 'ui-tabs__control',
                    'id' => "ui-tab-control-$itemId",
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
