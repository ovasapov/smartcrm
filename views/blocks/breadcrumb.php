<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
/* @var $this app\components\View */
/* @var $categories app\models\Category[] */

if (isset($this->params['breadcrumbs']) && $this->params['breadcrumbs']) { ?>
<div class="banner-wrapper <?= (isset($this->params['breadcrumbs'][0]['img'])) ? "has_background" : "no_background" ?>">
    <?php if (isset($this->params['breadcrumbs'][0]['img'])) {
        echo Html::img($this->params['breadcrumbs'][0]['img']['src'], [
            'alt' => 'img',
            'class' => $this->params['breadcrumbs'][0]['img']['class'],
        ]);
    }
    ?>
    <div class="banner-wrapper-inner <?= (isset($this->params['breadcrumbs'][0]['theme'])) ? $this->params['breadcrumbs'][0]['theme'] : "" ?>">
        <?php if (isset($this->params['breadcrumbs'][0]['heading'])) {
            echo Html::tag('h1', $this->params['breadcrumbs'][0]['heading'], ['class' => 'page-title container']);
        } ?>
        
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs container">
            <ul class="trail-items breadcrumb">
                <?php foreach ($this->params['breadcrumbs'] as $key => $breadcrumb) {
                    switch ($key){
                        case 0:
                            echo Html::tag(
                                'li', 
                                Html::a(
                                    Html::tag('span', $breadcrumb['title']), 
                                    Url::to($breadcrumb['url'])
                                ),
                                [
                                    'class' => 'trail-item trail-begin'
                                ]
                            );
                            break;
                        case (count($this->params['breadcrumbs']) - 1):
                            echo Html::tag(
                                'li', 
                                Html::tag('span', $breadcrumb['title']), 
                                [
                                    'class' => 'trail-item trail-end active'
                                ]
                            );
                            break;
                        default :
                            echo Html::tag(
                                'li', 
                                Html::a(
                                    Html::tag('span', $breadcrumb['title']), 
                                    Url::to($breadcrumb['url'])
                                ),
                                [
                                    'class' => 'trail-item'
                                ]
                            );
                    }
                } ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>