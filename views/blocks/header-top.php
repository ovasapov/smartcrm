<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
/* @var $this app\components\View */
?>
<div class="header-top">
    <div class="container">
        <div class="header-top-inner">
            <ul id="menu-top-left-menu" class="kobolg-nav top-bar-menu">
                <li id="menu-item-864"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-864">
                    <?= Html::a(Html::tag('span', '', ['class' => 'icon flaticon-placeholder']) . $this->app->t('Store direction'), ['site/direction'], [
                        'class' => 'kobolg-menu-item-title',
                        'title' => $this->app->t('Store direction')
                    ]) ?>
                </li>
                <li id="menu-item-865" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-865">
                    <?= Html::a(Html::tag('span', '', ['class' => 'icon flaticon-box']) . $this->app->t('Order tracking'), ['site/tracking'], [
                        'class' => 'kobolg-menu-item-title',
                        'title' => $this->app->t('Order tracking')
                    ]) ?>
                </li>
            </ul>
            <div class="kobolg-nav top-bar-menu right">
                <ul class="wpml-menu">
                    <li class="menu-item kobolg-dropdown block-language">
                        <?= Html::a(Html::img("@web/themes/kobolg/assets/images/{$ln}.png", [
                                'alt' => $ln,
                                'width' => '18',
                                'height' => '12'
                            ]) . " {$languages[$ln]} ", '#', [
                            'data-kobolg' => 'kobolg-dropdown'
                        ]) ?>
                        <span class="toggle-submenu"></span>
                        <ul class="sub-menu">
                            <?php 
                            foreach($languages as $key => $language){ 
                            if ($key === $ln){
                                continue;
                            }
                            ?>
                            <li class="menu-item">
                                <?= Html::a(Html::img("@web/themes/kobolg/assets/images/$key.png", [
                                        'alt' => $key,
                                        'width' => '18',
                                        'height' => '12'
                                    ]) . " {$language} ", Url::current(['language' => $key])
                                ) ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <div class="wcml-dropdown product wcml_currency_switcher">
                            <ul>
                                <li class="wcml-cs-active-currency">
                                    <?= Html::a($currencies[$cur], '#', [
                                        'class' => 'wcml-cs-item-toggle'
                                    ]) ?>
                                    <ul class="wcml-cs-submenu">
                                        <?php 
                                        foreach($currencies as $key => $currency){ 
                                        if ($key === $cur){
                                            continue;
                                        }
                                        ?>
                                        <li>
                                            <?= Html::a($currency, Url::current(['cur' => $key]) ) ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>