<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\web\View;

/**
 * Card widget.
 * A card is a basic presentation component with three sections: an optional header, content, and an optional footer
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
class Card extends UiWidget
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
     * @var string Card content.
     * If empty, content between Card::begin() and Card::end() calls is used
     */
    public $content;
    /**
     * @var array HTML attributes for the widget content
     * The content always has the `class` "ui-card__content"
     */
    public $contentOptions = [];
    /**
     * @var boolean Whether the title should be HTML-encoded.
     */
    public $encodeTitle = true;
    /**
     * @var string Card footer content.
     * If empty no footer is rendered.
     */
    public $footer;
    /**
     * @var array HTML attributes for the widget footer
     * The footer always has the `class` "ui-card__footer"
     */
    public $footerOptions = [];
    /**
     * @var string Card title.
     * If empty no title is rendered.
     */
    public $title;
    /**
     * @var array HTML attributes for the widget title
     * The title always has the `class` "ui-card__title"
     */
    public $titleOptions = [];

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
     * @throws InvalidConfigException
     */
    public function beforeRun()
    {
        if (parent::beforeRun()) {
            if (empty($this->content)) {
                $this->content = ob_get_clean();
            }

            if (empty($this->content)) {
                throw new InvalidConfigException("'content' is required.");
            }
            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        Html::addCssClass($this->contentOptions, 'ui-card__content');
        Html::addCssClass($this->footerOptions, 'ui-card__footer');
        Html::addCssClass($this->titleOptions, 'ui-card__title');
        return parent::run();
    }
}
