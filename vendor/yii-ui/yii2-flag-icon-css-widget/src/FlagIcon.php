<?php
/**
 * @author Christoph Möke <christophmoeke@gmail.com>
 * @copyright Copyright (c) 2019 Yii UI
 * @license https://www.yii-ui.com/packages/yii2-flag-icon-css-widget/license MIT
 * @link https://www.yii-ui.com/packages/yii2-flag-icon-css-widget
 * @see https://www.yii-ui.com/packages/yii2-flag-icon-css-widget/docs Documentation of yii2-flag-icon-css-widget
 * @since File available since Release 1.0.0
 */

namespace yiiui\yii2flagiconcss\widget;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\base\Widget;
use yiiui\yii2flagiconcss\assets\FlagIconCssAsset;

/**
 * FlagIcon renders a country flag.
 *
 * For example:
 *
 * ```php
 * echo FlagIcon::widget([
 *     'countryCode' => 'de',
 *     'options' => [
 *         'class' => 'example-flag'
 *     ],
 *     'squared' => true,
 * ]);
 * ```
 *
 * @package yiiui\yii2flagiconcss\widget
 */
class FlagIcon extends Widget
{
    /**
     * @var array the HTML attributes for the flag tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var string the ISO 3166-1 alpha-2 country code.
     * @see https://www.iso.org/obp/ui/#search/code/ for a list of all country codes.
     */
    public $countryCode;

    /**
     * @var string|bool|null the HTML tag name which holds the flag.
     * @see \yii\helpers\Html::tag() for details on how the HTML tag is generated.
     */
    public $tagName = 'span';

    /**
     * @var string the content of the HTML tag which holds the flag.
     * @see \yii\helpers\Html::tag() for details on how the HTML tag is generated.
     */
    public $tagContent = '';

    /**
     * @var bool use a squared version flag
     */
    public $squared = false;

    /**
     * @var bool add the default flag-icon class
     */
    public $default = true;

    /**
     * @var bool add the optional flag-icon-background class
     */
    public $background = false;

    /**
     * {@inheritdoc}
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!is_string($this->countryCode)) {
            throw new InvalidConfigException('The country code needs to be a ISO 3166-1 alpha-2 code https://www.iso.org/obp/ui/#search/code/');
        }

        if ($this->default) {
            Html::addCssClass($this->options, 'flag-icon');
        }

        if ($this->squared) {
            Html::addCssClass($this->options, 'flag-icon-squared');
        }

        if ($this->background) {
            Html::addCssClass($this->options, 'flag-icon-background');
        }

        Html::addCssClass($this->options, 'flag-icon-' . strtolower($this->countryCode));
    }

    public function beforeRun(): bool
    {
        if (!parent::beforeRun()) {
            return false;
        }

        FlagIconCssAsset::register($this->getView());

        return true;
    }

    public function run(): ?string
    {
        return Html::tag($this->tagName, $this->tagContent, $this->options);
    }
}
