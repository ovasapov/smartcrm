[![Yii UI](https://www.yii-ui.com/logos/logo-yii-ui-readme.jpg)](https://www.yii-ui.com/) Yii UI - Yii2 Flag icon css - Asset Bundle
================================================

[![Latest Stable Version](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-asset-bundle/version)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-asset-bundle)
[![Total Downloads](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-asset-bundle/downloads)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-asset-bundle)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![License](https://poser.pugx.org/yii-ui/yii2-flag-icon-css-asset-bundle/license)](https://packagist.org/packages/yii-ui/yii2-flag-icon-css-asset-bundle)


This is an [Yii framework 2.0](http://www.yiiframework.com) asset bundle of the [Lipis flag-icon-css](https://github.com/lipis/flag-icon-css) package.

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run
```
php composer.phar require yii-ui/yii2-flag-icon-css-asset-bundle
```
or add
```
"yii-ui/yii2-flag-icon-css-asset-bundle": "^1.0"
```
to the require section of your `composer.json` file.

Usage
-----

in your layout file (ex. views/layouts/main.php):
```php
\yiiui\yii2flagiconcss\assets\FlagIconCssAsset::register($this);
```

or as dependency in your app asset bundle:
```php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';

    public $js = [
        'js/main.js',
    ];

    public $css = [
        'css/main.scss',
    ];

    public $depends = [
        'yiiui\yii2flagiconcss\assets\FlagIconCssAsset'
    ];
}
```

See https://www.yii-ui.com/packages/yii2-flag-icon-css-asset-bundle for more infos.
For plugin configuration see [Lipis](https://github.com/lipis) flag-icon-css [Documentation](http://lipis.github.io/flag-icon-css/).

Documentation
------------

Documentation can be found at https://www.yii-ui.com/packages/yii2-flag-icon-css-asset-bundle/docs.

License
-------

**yii2-flag-icon-css-asset-bundle** is released under the MIT License. See the [LICENSE](LICENSE) for details.
