<?php
use app\components\helpers\Tbl;

class m000000_600100_comment extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::comment, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'product_id'            => $this->integer(11)->unsigned()->notNull(),
            'status_id'             => $this->smallInteger(2)->unsigned()->notNull(),
            'user_id'               => $this->integer(11)->unsigned(),
            'title'                 => $this->string(100),
            'content'               => $this->text(),
            'rating'                => $this->smallInteger(1),
            'created_at'            => $this->integer(11)->notNull(),
            'updated_at'            => $this->integer(11),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_title', Tbl::comment, 'title');
        $this->createIndex('index_rating', Tbl::comment, 'rating');
        $this->createIndex('index_created_at', Tbl::comment, 'created_at');
        $this->createIndex('index_updated_at', Tbl::comment, 'updated_at');
        
        $this->createIndex('index_product_id', Tbl::comment, 'product_id');
        $this->addForeignKey('fk_comment_product_id',Tbl::comment, 'product_id', Tbl::product, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_user_id', Tbl::comment, 'user_id');
        $this->addForeignKey('fk_comment_user_id',Tbl::comment, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_status_id', Tbl::comment, 'status_id');
        $this->addForeignKey('fk_comment_status_id',Tbl::comment, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::comment);
    }
}
