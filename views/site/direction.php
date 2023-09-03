<?php
use yii\bootstrap4\Html;

/* @var $this app\components\View */

$this->title = $this->app->t('Direction');

$this->params['breadcrumbs'] = [
    [
        'title' => 'Home', 
        'heading' => $this->title,
        'img' => ['src' => '@web/upload/breadcrumbs.jpg', 'class' => 'img-responsive attachment-1920x447 size-1920x447'], 
        'theme' => 'light',
        'url' => ['site/index'],
    ],
    ['title' => $this->title],
];
?>