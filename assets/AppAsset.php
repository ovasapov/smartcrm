<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'themes/kobolg/assets/css/bootstrap.min.css',
        'themes/kobolg/assets/css/animate.css',
        'themes/kobolg/assets/css/chosen.min.css',
        'themes/kobolg/assets/css/font-awesome.min.css',
        'themes/kobolg/assets/css/jquery.scrollbar.css',
        'themes/kobolg/assets/css/lightbox.min.css',
        'themes/kobolg/assets/css/magnific-popup.css',
        'themes/kobolg/assets/css/slick.min.css',
        'themes/kobolg/assets/fonts/flaticon.css',
        'themes/kobolg/assets/css/megamenu.css',
        'themes/kobolg/assets/css/dreaming-attribute.css',
        'themes/kobolg/assets/css/style.css',
        'css/site.css',
    ];
    public $js = [
        //'themes/kobolg/assets/js/jquery-1.12.4.min.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM',
        //'themes/kobolg/assets/js/bootstrap.min.js',
        'themes/kobolg/assets/js/chosen.min.js',
        'themes/kobolg/assets/js/countdown.min.js',
        'themes/kobolg/assets/js/jquery.scrollbar.min.js',
        'themes/kobolg/assets/js/lightbox.min.js',
        'themes/kobolg/assets/js/magnific-popup.min.js',
        'themes/kobolg/assets/js/slick.js',
        'themes/kobolg/assets/js/jquery.zoom.min.js',
        'themes/kobolg/assets/js/threesixty.min.js',
        'themes/kobolg/assets/js/jquery-ui.min.js',
        'themes/kobolg/assets/js/mobilemenu.js',
        'themes/kobolg/assets/js/functions.js',
        'js/site.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\captcha\CaptchaAsset',
        'yii\widgets\ActiveFormAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset'
    ];
}
