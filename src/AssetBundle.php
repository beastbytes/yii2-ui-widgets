<?php
/**
 * @copyright Copyright &copy; 2020 BeastBytes - All Rights Reserved
 * @license https://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @link https://www.yiiframework.com/
 */

namespace BeastBytes\UiWidgets;

/**
 * AssetBundle is the base asset bundle for widgets
 *
 * @author Chris Yates
 * @package BeastBytes\UiWidgets
 */
class AssetBundle extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
    }
}
