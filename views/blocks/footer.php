<?php
use yii\bootstrap4\Html;
/* @var $this app\components\View */

?>
<footer id="footer" class="footer style-01">
    <?= $this->render('@app/views/blocks/footer/newsletter', []); ?>
    
    <?= $this->render('@app/views/blocks/footer/copyright', []); ?>
    
    <?= $this->render('@app/views/blocks/footer/device-mobile', []); ?>
</footer>
