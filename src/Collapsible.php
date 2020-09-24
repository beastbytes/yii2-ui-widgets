<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

use yii\helpers\Html;

/**
 * CSS only Collapsible widget
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
*/
class Collapsible extends UiWidget
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
     * @var array HTML attributes for the widget button
     * The button always has the `class` "ui-collapsible__button" and will have the `for` attribute set
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    public $buttonOptions = [];
    /**
     * @var array HTML attributes for the widget content
     * The content always has the `class` "ui-collapsible__content"
     */
    public $contentOptions = [];
    /**
     * @var string|null Widget content. If `null` the content between Collapsible::begin() and Collapsible::end() is used
     */
    public $content;

    /**
     * @inheritdoc
     */
    public static function begin($config = [])
    {
        ob_start();
        return parent::begin($config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->buttonOptions['for'] = 'ui-collapsible__control-' . $this->getId();
        Html::addCssClass($this->buttonOptions, 'ui-collapsible__button');
        Html::addCssClass($this->contentOptions, 'ui-collapsible__content');
    }

    /**
     * @inheritdoc
     */
    public function beforeRun()
    {
        if (parent::beforeRun()) {
            if (empty($this->content)) {
                $this->content = ob_get_clean();
            }
            return true;
        }

        return false;
    }
}
