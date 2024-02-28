<?php
/* @var $this app\components\View */

$this->title = $this->app->t('Homepage');
?>
<?= $this->render('@app/views/blocks/section/slider', []); ?>

<?= $this->render('@app/views/blocks/section/banner', []); ?>

<?= $this->render('@app/views/blocks/section/new-arrival', []); ?>

<?= $this->render('@app/views/blocks/section/new-collection', []); ?>

<?= $this->render('@app/views/blocks/section/blog', []); ?>

<?= $this->render('@app/views/blocks/section/iconbox', []); ?>

<?= $this->render('@app/views/blocks/section/instagram', []); ?>