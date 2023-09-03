<?php
namespace app\components;

use app\components\helpers\App;

/**
 * @property App $app
 */

class View extends \yii\web\View
{
    public $app;

    public function __construct($config = array()) {
        $this->app = new App();
        
        parent::__construct($config);
    }
}