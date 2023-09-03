<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
/* @var $this app\components\View */
?>
<div class="header-wrap-stick">
    <div class="header-position">
        <div class="header-nav">
            <div class="container">
                <div class="kobolg-menu-wapper"></div>
                <div class="header-nav-inner">
                    <div data-items="8"
                         class="vertical-wrapper block-nav-category has-vertical-menu show-button-all">
                        <div class="block-title">
                            <span class="before">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="text-title"><?= $this->app->t('Shop by categories') ?></span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul id="menu-vertical-menu" class="azeroth-nav vertical-menu default">
                                <?php foreach ($categories as $key => $category) { ?>
                                <li id="menu-item-<?= $category->id ?>" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-<?= $category->id ?>">
                                    <?= Html::a(Html::tag('span', '', ['class' => $category->icon]) . $this->app->t($category->name), 
                                        ['site/category', 'id' => $category->slug], 
                                        ['class' => 'azeroth-menu-item-title']
                                    ) ?>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="view-all-category">
                                <?= Html::a($this->app->t('All categories'), 
                                    "", 
                                    [
                                        'class' => 'btn-view-all open-cate',
                                        'data-alltext' => $this->app->t('All categories')
                                    ]
                                ) ?>
                            </div>
                        </div>
                    </div><!-- block category -->
                    <div class="box-header-nav menu-nocenter">
                        <ul id="menu-primary-menu"
                            class="clone-main-menu kobolg-clone-mobile-menu kobolg-nav main-menu">
                            <li id="menu-item-230"
                                class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                <a class="kobolg-menu-item-title" title="Home" href="index.html">Home</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu megamenu megamenu-home">
                                    <div class="demo-item">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="index.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo001.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="index.html">Home 01</a>
                                                </h5>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="home-02.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo002.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="home-02.html">Home 02</a>
                                                </h5>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="home-03.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo003.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="home-03.html">Home 03</a>
                                                </h5>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="home-04.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo004.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="home-04.html">Home 04</a></h5>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="home-05.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo005.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="home-05.html">Home 05</a>
                                                </h5>
                                            </div>
                                            <div class="col-md-6 col-lg-4 col-sm-6">
                                                <div class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                    <figure class="dreaming_wrapper az_figure">
                                                        <a href="home-06.html" target="_self"
                                                           class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                            <?= Html::img('@web/themes/kobolg/assets/images/demo006.jpg', [
                                                                'alt' => 'img',
                                                                'class' => 'az_single_image-img attachment-full',
                                                            ]) ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <h5 class="az_custom_heading">
                                                    <a href="home-06.html">Home 06</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="menu-item-228"
                                class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                <a class="kobolg-menu-item-title" title="Shop"
                                   href="shop.html">Shop</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu megamenu megamenu-shop">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">Shop Layouts </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="shop.html" target="_self">Shop Grid </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list.html" target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-new.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Shop List
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.html" target="_self">No Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-leftsidebar.html" target="_self">Left
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-rightsidebar.html" target="_self">Right
                                                                Sidebar </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">Product Layouts </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="single-product.html" target="_self">Vertical
                                                                Thumbnails </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-policy.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-new.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Extra Sidebar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-rightsidebar.html"
                                                               target="_self">
                                                                Right Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-leftsidebar.html"
                                                               target="_self">
                                                                Left Sidebar </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Product Extends </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="single-product-bundle.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-new.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Product Bundle
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-360deg.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-hot.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Product 360 Deg </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-video.html"
                                                               target="_self">
                                                                Video </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Other Pages </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="cart.html">Cart </a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html" target="_self">Wishlist </a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.html" target="_self">Checkout </a>
                                                        </li>
                                                        <li>
                                                            <a href="order-tracking.html" target="_self">Order
                                                                Tracking </a>
                                                        </li>
                                                        <li>
                                                            <a href="my-account.html" target="_self">My Account </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Product Types </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="single-product-simple.html"
                                                               target="_self">
                                                                Simple </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-hot.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Variable </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-external.html"
                                                               target="_self">
                                                                External / Affiliate </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-group.html"
                                                               target="_self">
                                                                Grouped </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-outofstock.html"
                                                               target="_self">
                                                                Out Of Stock </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-onsale.html"
                                                               target="_self">
                                                                On Sale </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="menu-item-229"
                                class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children">
                                <a class="kobolg-menu-item-title" title="Elements" href="#">Elements</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu megamenu megamenu-elements">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">Element 1 </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="banner.html"
                                                               target="_self">Banner </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-element.html"
                                                               target="_self">Blog Element </a>
                                                        </li>
                                                        <li>
                                                            <a href="categories-element.html"
                                                               target="_self">
                                                                Categories Element </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-element.html"
                                                               target="_self">
                                                                Product Element </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Element 2 </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="client.html"
                                                               target="_self">
                                                                Client </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-layout.html"
                                                               target="_self">
                                                                Product Layout </a>
                                                        </li>
                                                        <li>
                                                            <a href="google-map.html"
                                                               target="_self">
                                                                Google map </a>
                                                        </li>
                                                        <li>
                                                            <a href="iconbox.html"
                                                               target="_self">
                                                                Icon Box </a>
                                                        </li>
                                                        <li>
                                                            <a href="team.html"
                                                               target="_self">
                                                                Team </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Element 3 </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="instagram-feed.html"
                                                               target="_self">
                                                                Instagram Feed </a>
                                                        </li>
                                                        <li>
                                                            <a href="newsletter.html"
                                                               target="_self">
                                                                Newsletter </a>
                                                        </li>
                                                        <li>
                                                            <a href="testimonials.html"
                                                               target="_self">
                                                                Testimonials </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="menu-item-996"
                                class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children">
                                <a class="kobolg-menu-item-title" title="Blog"
                                   href="blog.html">Blog</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu megamenu megamenu-blog">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Blog Layout </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="blog.html" target="_self">No Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-leftsidebar.html" target="_self">Left
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-rightsidebar.html" target="_self">Right
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog.html" target="_self">Blog Standard </a>
                                                        </li>
                                                        <li>
                                                            <a href="blog-grid.html" target="_self">Blog Grid </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Post Layout </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="single-post.html" target="_self">No
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-leftsidebar.html" target="_self">Left
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-rightsidebar.html" target="_self">Right
                                                                Sidebar </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-instagram.html" target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-hot.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Instagram In Post
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-product.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-new.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Product In Post
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kobolg-listitem style-01">
                                                <div class="listitem-inner">
                                                    <h4 class="title">
                                                        Post Format </h4>
                                                    <ul class="listitem-list">
                                                        <li>
                                                            <a href="single-post.html" target="_self">Standard </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-gallery.html" target="_self">Gallery </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-post-video.html"
                                                               target="_self">
                                                                <span class="image">
                                                                    <?= Html::img('@web/themes/kobolg/assets/images/label-hot.jpg', [
                                                                        'alt' => 'img',
                                                                        'class' => 'attachment-full size-full',
                                                                    ]) ?>
                                                                </span>
                                                                Video
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="menu-item-237"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent">
                                <a class="kobolg-menu-item-title" title="Pages" href="#">Pages</a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class="submenu">
                                    <li id="menu-item-987"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-987">
                                        <a class="kobolg-menu-item-title" title="About"
                                           href="about.html">About</a></li>
                                    <li id="menu-item-988"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-988">
                                        <a class="kobolg-menu-item-title" title="Contact"
                                           href="contact.html">Contact</a></li>
                                    <li id="menu-item-990"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-990">
                                        <a class="kobolg-menu-item-title" title="Page 404"
                                           href="404.html">Page 404</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-238"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-238">
                                <?= Html::a(
                                    $this->app->t('Free shipping on orders {summary}', 
                                        ['summary' => $this->app->params('free_shipping_summary')[$this->app->language()]]
                                    ), ['shipping'], [
                                        'class' => 'kobolg-menu-item-title',
                                        'title' => $this->app->t('Shipping on orders.')
                                    ]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>