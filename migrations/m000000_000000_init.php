<?php
class m000000_000000_init extends \yii\db\Migration
{
    public function safeUp()
    {
        echo Yii::t('app', 'Installing Migrations.');
    }

    public function safeDown()
    {
        echo Yii::t('app', 'Dropping Migrations.');
    }
}