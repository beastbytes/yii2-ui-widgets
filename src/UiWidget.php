<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * UiWidget is the base class for all the UI Widgets
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
abstract class UiWidget extends Widget
{
    /**
     * @var string|null|boolean Fully qualified class name of the widget's CSS asset bundle; this should depend on the
     * default asset bundle to inherit the widget behaviour.
     * If `null` the default asset bundle is published.
     * If `false` no asset bundle is published.
     */
     public $assetBundle;
    /**
     * @var array HTML attributes for the widget container tag
     * @see \yii\helpers\Html::renderTagAttributes() for details of how attributes are rendered.
     */
    public $options = [];

    /**
     * @var string Widget base class
     */
    private $_baseClass;
    /**
     * @var string widget basename
     */
    private $_basename;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->_basename = StringHelper::basename(get_class($this));
        $this->_baseClass = Inflector::camel2id($this->_basename);

        Html::addCssClass($this->options, 'ui-' . $this->_baseClass);

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        if ($this->assetBundle !== false) {
            if (is_null($this->assetBundle)) {
                $assetBundle = __NAMESPACE__ . '\\' . $this->_basename . 'Asset';
            } else {
                $assetBundle = $this->assetBundle;
            }

            $assetBundle::register($this->getView());
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render(lcfirst($this->_basename), ['widget' => $this]);
    }
}
