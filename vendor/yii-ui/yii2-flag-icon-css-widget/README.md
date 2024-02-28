[![Yii UI](https://www.yii-ui.com/logos/logo-yii-ui-readme.jpg)](https://www.yii-ui.com/) Yii UI - Yii2 Flag icon css - Widget
================================================

[![Latest Stable Version](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-widget/version)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-widget)
[![Total Downloads](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-widget/downloads)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-widget)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![License](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-widget/license)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-widget)


This is an [Yii framework 2.0](http://www.yiiframework.com) widget of the [Lipis flag-icon-css](https://github.com/lipis/flag-icon-css) package.

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run
```
php composer.phar require yii-ui/yii2-flag-icon-css-widget
```
or add
```
"yii-ui/yii2-flag-icon-css-widget": "^1.0"
```
to the require section of your `composer.json` file.

Usage
-----

```php
use yiiui\yii2flagiconcss\widget\FlagIcon;

echo FlagIcon::widget([
    'countryCode' => 'de',
    'options' => [
        'class' => 'example-flag'
    ],
    'squared' => true,
]);
```

See https://www.yii-ui.com/packages/yii2-flag-icon-css-widget for more infos.
For plugin configuration see [Lipis](https://github.com/lipis) flag-icon-css [Documentation](http://lipis.github.io/flag-icon-css/).

Documentation
------------

Documentation can be found at https://www.yii-ui.com/packages/yii2-flag-icon-css-widget/docs.

License
-------

**yii2-flag-icon-css-widget** is released under the MIT License. See the [LICENSE](LICENSE) for details.
