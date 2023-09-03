<?php
use app\components\helpers\Tbl;

class m000000_600550_view extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::view, [
            'id'             => $this->primaryKey(11)->notNull()->unsigned(),
            'visit_id'       => $this->integer(11)->unsigned(),
            'user_id'        => $this->integer(11)->unsigned(),
            'ip'             => $this->string(20)->notNull(),
            'url'            => $this->string(255),
            'referer'        => $this->string(255),
            'created_at'     => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');
        
        $this->createIndex('index_visit_id', Tbl::view, 'visit_id');
        $this->addForeignKey('fk_view_visit_id',Tbl::view, 'visit_id', Tbl::visit, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_user_id', Tbl::view, 'user_id');
        $this->addForeignKey('fk_view_user_id',Tbl::view, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex("index_url", Tbl::view, 'url');
        $this->createIndex("index_referer", Tbl::view, 'referer');
        $this->createIndex("index_ip", Tbl::view, 'ip');
        $this->createIndex("index_created_at", Tbl::view, 'created_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::view);
    }
}
