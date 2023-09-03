<?php
namespace app\components;

/**
 * @property App $app
 */

class Controller extends \yii\web\Controller
{
    public $app;

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
    }
    
    public function init() {
        parent::init();
    }
}