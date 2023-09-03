<?php
use app\components\helpers\Tbl;

class m000000_600510_visit extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::visit, [
            'id'             => $this->primaryKey(11)->notNull()->unsigned(),
            'session'        => $this->string(32),
            'domain'         => $this->string(50)->notNull(),
            'created_at'     => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');
        
        $this->createIndex("index_session", Tbl::visit, 'session');
        $this->createIndex("index_domain", Tbl::visit, 'domain');
        $this->createIndex("index_created_at", Tbl::visit, 'created_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::visit);
    }
}
