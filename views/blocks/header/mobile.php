<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
/* @var $this app\components\View */
?>
<div class="header-mobile">
    <div class="header-mobile-left">
        <div class="block-menu-bar">
            <a class="menu-bar menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        <div class="header-search kobolg-dropdown">
            <div class="header-search-inner" data-kobolg="kobolg-dropdown">
                <a href="#" class="link-dropdown block-link">
                    <span class="flaticon-search"></span>
                </a>
            </div>
            <div class="block-search">
                <form role="search" method="get"
                      class="form-search block-search-form kobolg-live-search-form">
                    <div class="form-content search-box results-search">
                        <div class="inner">
                            <input autocomplete="off" class="searchfield txt-livesearch input" name="s" value=""
                                   placeholder="Search here..." type="text">
                        </div>
                    </div>
                    <input name="post_type" value="product" type="hidden">
                    <input name="taxonomy" value="product_cat" type="hidden">
                    <div class="category">
                        <select title="product_cat" name="product_cat" id="1770352541"
                                class="category-search-option" tabindex="-1"
                                style="display: none;">
                            <option value="0">All Categories</option>
                            <option class="level-0" value="light">Camera</option>
                            <option class="level-0" value="chair">Accessories</option>
                            <option class="level-0" value="table">Game & Consoles</option>
                            <option class="level-0" value="bed">Life style</option>
                            <option class="level-0" value="new-arrivals">New arrivals</option>
                            <option class="level-0" value="lamp">Summer Sale</option>
                            <option class="level-0" value="specials">Specials</option>
                            <option class="level-0" value="sofas">Featured</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit">
                        <span class="flaticon-search"></span>
                    </button>
                </form><!-- block search -->
            </div>
        </div>
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
    <div class="header-mobile-mid">
        <div class="header-logo">
            <?= Html::a(
                Html::img('@web/upload/logo/icon.png', ['alt' => 'Kobolg','class' => 'logo']) . 
                Html::tag('span', 'Mac', ['class' => 'logo-part logo-part-1']) . 
                Html::tag('span', 'Desk', ['class' => 'logo-part logo-part-2']), '/'
            ) ?>
        </div>
    </div>
    <div class="header-mobile-right">
        <div class="header-control-inner">
            <div class="meta-dreaming">
                <div class="menu-item block-user block-dreaming kobolg-dropdown">
                    <a class="block-link" href="my-account.html">
                        <span class="flaticon-profile"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                            <a href="#">Orders</a>
                        </li>
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--downloads">
                            <a href="#">Downloads</a>
                        </li>
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-addresses">
                            <a href="#">Addresses</a>
                        </li>
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-account">
                            <a href="#">Account details</a>
                        </li>
                        <li class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                            <a href="#">Logout</a>
                        </li>
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
                            <h3 class="minicart-title">Your Cart<span class="minicart-number-items">3</span></h3>
                            <ul class="kobolg-mini-cart cart_list product_list_widget">
                                <li class="kobolg-mini-cart-item mini_cart_item">
                                    <a href="#" class="remove remove_from_cart_button">×</a>
                                    <a href="#">
                                        <?= Html::img('@web/themes/kobolg/assets/images/apro134-1-600x778.jpg', [
                                            'alt' => 'img',
                                            'height' => '778',
                                            'width' => '600',
                                            'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                        ]) ?>
                                        T-shirt with skirt – Pink&nbsp;
                                    </a>
                                    <span class="quantity">1 × <span
                                            class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>150.00</span></span>
                                </li>
                                <li class="kobolg-mini-cart-item mini_cart_item">
                                    <a href="#" class="remove remove_from_cart_button">×</a>
                                    <a href="#">
                                        <?= Html::img('@web/themes/kobolg/assets/images/apro1113-600x778.jpg', [
                                            'alt' => 'img',
                                            'height' => '778',
                                            'width' => '600',
                                            'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                        ]) ?>
                                        Red Consoles&nbsp;
                                    </a>
                                    <span class="quantity">1 × <span
                                            class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>129.00</span></span>
                                </li>
                                <li class="kobolg-mini-cart-item mini_cart_item">
                                    <a href="#" class="remove remove_from_cart_button">×</a>
                                    <a href="#">
                                        <?= Html::img('@web/themes/kobolg/assets/images/apro201-1-600x778.jpg', [
                                            'alt' => 'img',
                                            'height' => '778',
                                            'width' => '600',
                                            'class' => 'attachment-kobolg_thumbnail size-kobolg_thumbnail',
                                        ]) ?>
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