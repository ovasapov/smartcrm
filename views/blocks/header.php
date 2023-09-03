<?php
/* @var $this app\components\View */
/* @var $categories app\models\Category[] */
?>
<header id="header" class="header style-04 header-dark">
    <?= $this->render('@app/views/blocks/header-top', [
        'languages' => $this->app->params('languages'),
        'ln' => $this->app->language(),
        'currencies' => $this->app->params('currencies'),
        'cur' => $this->app->getCookie('_currency') ? $this->app->getCookie('_currency') : 'rub'
    ]); ?>
    
    <?= $this->render('@app/views/blocks/header-middle', [
        'categories' => $categories
    ]); ?>
    
    <?= $this->render('@app/views/blocks/header-wrap', [
        'categories' => $categories
    ]); ?>
    
    <?= $this->render('@app/views/blocks/header-mobile', [
        'languages' => $this->app->params('languages'),
        'ln' => $this->app->language(),
        'currencies' => $this->app->params('currencies'),
        'cur' => $this->app->getCookie('_currency') ? $this->app->getCookie('_currency') : 'rub'
    ]); ?>
</header>