<?php
/**
 * @author Christoph Möke <christophmoeke@gmail.com>
 * @copyright Copyright (c) 2019 Yii UI
 * @license https://www.yii-ui.com/packages/yii2-flag-icon-css-asset-bundle/license MIT
 * @link https://www.yii-ui.com/packages/yii2-flag-icon-css-asset-bundle
 * @see https://www.yii-ui.com/packages/yii2-flag-icon-css-asset-bundle/docs Documentation of yii2-flag-icon-css-asset-bundle
 * @since File available since Release 1.0.0
 */

namespace yiiui\yii2flagiconcss\assets;

use yii\web\AssetBundle;

/**
 * Class FlagIconCssAsset
 * @package yiiui\yii2flagiconcss\assets
 */
class FlagIconCssAsset extends AssetBundle
{
    public $sourcePath = '@vendor/components/flag-icon-css';

    public $css = [
        'css/flag-icon.min.css'
    ];
}
