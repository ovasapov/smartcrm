<?php
use app\components\helpers\Tbl;

class m000000_600050_product_quantity extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::product_quantity, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'product_id'            => $this->integer(11)->unsigned()->notNull(),
            'price'                 => $this->float(8.2)->defaultValue(0.00),
            'quantity'              => $this->integer(5)->unsigned()->notNull(),
            'content'               => $this->text(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
            'updated_at'            => $this->integer(11)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::product_quantity, 'user_id');
        $this->addForeignKey('fk_product_quantity_user_id',Tbl::product_quantity, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::product_quantity, 'status_id');
        $this->addForeignKey('fk_product_quantity_status_id',Tbl::product_quantity, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_product_id', Tbl::product_quantity, 'product_id');
        $this->addForeignKey('fk_product_quantity_product_id',Tbl::product_quantity, 'product_id', Tbl::product, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_price', Tbl::product_quantity, 'price');
        $this->createIndex('index_quantity', Tbl::product_quantity, 'quantity');
        $this->createIndex('index_created_at', Tbl::product_quantity, 'created_at');
        $this->createIndex('index_updated_at', Tbl::product_quantity, 'updated_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::product_quantity);
    }
}
