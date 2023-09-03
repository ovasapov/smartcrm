<?php

/* @var $this app\components\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

?>
<div class="container">
    <h1 class="title-404"><?= Html::encode(Yii::$app->errorHandler->exception->statusCode) ?></h1>
    <h1 class="title"><?= nl2br($message) ?></h1>
    <p class="subtitle"><?= $exception->getPrevious()->getMessage() ?></p>
    <!-- .page-content -->
    <?= Html::a($this->app->t('Back to hompage'), ['site/index'], ['class' => 'button']) ?>
</div>