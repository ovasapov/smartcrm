<?php
use app\components\helpers\Tbl;

class m000000_600001_product_category extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::product_category, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'product_id'            => $this->integer(11)->unsigned()->notNull(),
            'category_id'           => $this->smallInteger(5)->unsigned()->notNull(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_product_id', Tbl::product_category, 'product_id');
        $this->addForeignKey('fk_product_category_product_id',Tbl::product_category, 'product_id', Tbl::product, 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('index_category_id', Tbl::product_category, 'category_id');
        $this->addForeignKey('fk_product_category_category_id',Tbl::product_category, 'category_id', Tbl::category, 'id', 'CASCADE', 'CASCADE');
        
        $this->createIndex('index_created_at', Tbl::product_category, 'created_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::product_category);
    }
}
