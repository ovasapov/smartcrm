<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
/* @var $this app\components\View */
/* @var $categories app\models\Category[] */
?>
<div class="header-middle">
    <div class="container">
        <div class="header-middle-inner">
            <div class="header-logo-menu">
                <div class="block-menu-bar">
                    <a class="menu-bar menu-toggle" href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="header-logo">
                    <?= Html::a(
                        Html::img('@web/upload/logo/icon.png', ['alt' => 'Kobolg','class' => 'logo']) . 
                        Html::tag('span', 'Mac', ['class' => 'logo-part logo-part-1']) . 
                        Html::tag('span', 'Desk', ['class' => 'logo-part logo-part-2']), '/'
                    ) ?>
                </div>
            </div>
            <div class="header-search-mid">
                <div class="header-search">
                    <div class="block-search">
                        <form role="search" method="get"
                              class="form-search block-search-form kobolg-live-search-form">
                            <div class="form-content search-box results-search">
                                <div class="inner">
                                    <?= Html::input('text', 's', null, [
                                        'placeholder' => $this->app->t('Search here...'),
                                        'class' => 'searchfield txt-livesearch input',
                                        'autocomplete' => 'off'
                                    ]) ?>
                                </div>
                            </div>
                            <input name="post_type" value="product" type="hidden">
                            <input name="taxonomy" value="product_cat" type="hidden">
                            <div class="category">
                                <select title="product_cat" name="product_cat" id="1771262470"
                                        class="category-search-option"
                                        tabindex="-1" style="display: none;">
                                    <option value="0"><?= $this->app->t('All categories') ?></option>
                                    <?php foreach ($categories as $key => $category) { ?>
                                    <option class="level-0" value="<?= $category->slug ?>"><?= $this->app->t($category->name) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn-submit">
                                <span class="flaticon-search"></span>
                            </button>
                        </form><!-- block search -->
                    </div>
                </div>
            </div>
            <div class="header-control">
                <div class="header-control-inner">
                    <div class="meta-dreaming">
                        <div class="menu-item block-user block-dreaming kobolg-dropdown">
                            <a class="block-link" href="my-account.html">
                                <span class="flaticon-profile"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if (!$this->app->isGuest()) { ?>
                                <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                    <?= Html::a($this->app->t('Dashboard'), ['dashboard']) ?>
                                </li>
                                <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                    <?= Html::a($this->app->t('Orders'), ['orders']) ?>
                                </li>
                                <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-account">
                                    <?= Html::a($this->app->t('Account'), ['account']) ?>
                                </li>
                                <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                    <?= Html::a($this->app->t('Logout'), ['site/logout'], ['data' => ['method' => 'post']]) ?>
                                </li>
                                <?php } else { ?>
                                <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-login">
                                    <?= Html::a($this->app->t('Login'), ['login']) ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                            <div class="shopcart-dropdown block-cart-link" data-kobolg="kobolg-dropdown">
                                <a class="block-link link-dropdown" href="cart.html">
                                    <span class="flaticon-online-shopping-cart"></span>
                                    <span class="count">3</span>
                                </a>
                            </div>
                            <div class="widget kobolg widget_shopping_cart">
                                <div class="widget_shopping_cart_content">
                                    <h3 class="minicart-title">
                                        <?= $this->app->t('Your cart') ?>
                                        <span class="minicart-number-items">3</span>
                                    </h3>
                                    <ul class="kobolg-mini-cart cart_list product_list_widget">
                                        <li class="kobolg-mini-cart-item mini_cart_item">
                                            <a href="#" class="remove remove_from_cart_button">×</a>
                                            <a href="#">
                                                <?=
                                                Html::img('@web/themes/kobolg/assets/images/apro134-1-600x778.jpg', [
                                                    'alt' => 'img',
                                                    'width' => '600',
                                                    'height' => '778',
                                                    'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                                ])
                                                ?>
                                                T-shirt with skirt – Pink&nbsp;
                                            </a>
                                            <span class="quantity">1 × <span
                                                    class="kobolg-Price-amount amount"><span
                                                        class="kobolg-Price-currencySymbol">$</span>150.00</span></span>
                                        </li>
                                        <li class="kobolg-mini-cart-item mini_cart_item">
                                            <a href="#" class="remove remove_from_cart_button">×</a>
                                            <a href="#">
                                                <?=
                                                Html::img('@web/themes/kobolg/assets/images/apro1113-600x778.jpg', [
                                                    'alt' => 'img',
                                                    'width' => '600',
                                                    'height' => '778',
                                                    'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                                ])
                                                ?>
                                                Red Consoles&nbsp;
                                            </a>
                                            <span class="quantity">1 × <span
                                                    class="kobolg-Price-amount amount"><span
                                                        class="kobolg-Price-currencySymbol">$</span>129.00</span></span>
                                        </li>
                                        <li class="kobolg-mini-cart-item mini_cart_item">
                                            <a href="#" class="remove remove_from_cart_button">×</a>
                                            <a href="#">
                                                <?=
                                                Html::img('@web/themes/kobolg/assets/images/apro201-1-600x778.jpg', [
                                                    'alt' => 'img',
                                                    'width' => '600',
                                                    'height' => '778',
                                                    'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                                ])
                                                ?>
                                                Smart Monitor&nbsp;
                                            </a>
                                            <span class="quantity">1 × <span
                                                    class="kobolg-Price-amount amount"><span
                                                        class="kobolg-Price-currencySymbol">$</span>139.00</span></span>
                                        </li>
                                    </ul>
                                    <p class="kobolg-mini-cart__total total"><strong>Subtotal:</strong>
                                        <span class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>418.00</span>
                                    </p>
                                    <p class="kobolg-mini-cart__buttons buttons">
                                        <a href="cart.html" class="button kobolg-forward">Viewcart</a>
                                        <a href="checkout.html" class="button checkout kobolg-forward">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>