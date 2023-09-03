<?php
use app\components\helpers\Tbl;

class m000000_000012_post extends \yii\db\Migration
{
    public function safeUp()
    {
        echo Yii::t('app', 'Installing Post.');
    }

    public function safeDown()
    {
        echo Yii::t('app', 'Dropping Post.');
    }
}
