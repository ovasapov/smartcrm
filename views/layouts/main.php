<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\components\helpers\Htm;
use app\models\Category;

AppAsset::register($this);

$categories = Category::find()->all();
/* @var $this app\components\View */

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <?= $this->render('@app/views/blocks/head');  ?>

    <body class="<?= isset($this->params['body']['class']) ? $this->params['body']['class'] : "" ?>">
        <?php $this->beginBody() ?>
        <?= $this->render('@app/views/blocks/header', ['categories' => $categories]); ?>
        
        <?= $this->render('@app/views/blocks/breadcrumb');  ?>
        
        <main role="main" class="<?= isset($this->params['main']['class']) ? $this->params['main']['class'] : "fullwidth-template" ?>">
            <?= $content ?>
        </main>
        <?= $this->render('@app/views/blocks/footer'); ?>

        <?= Html::a(Htm::fa('angle-up'), '#', ['class' => 'backtotop active']) ?>
        
        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage(); ?>