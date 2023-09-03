<?php
use app\components\helpers\Tbl;

class m000000_700100_cart extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::cart, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'visit_id'              => $this->integer(11)->unsigned(),
            'name'                  => $this->string(75)->notNull(),
            'content'               => $this->text(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::cart, 'user_id');
        $this->addForeignKey('fk_cart_user_id',Tbl::cart, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_visit_id', Tbl::cart, 'visit_id');
        $this->addForeignKey('fk_cart_visit_id',Tbl::cart, 'visit_id', Tbl::visit, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_name', Tbl::cart, 'name');
        $this->createIndex('index_created_at', Tbl::cart, 'created_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::cart);
    }
}
