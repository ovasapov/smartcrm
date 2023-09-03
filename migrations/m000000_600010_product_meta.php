<?php
use app\components\helpers\Tbl;

class m000000_600010_product_meta extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::product_meta, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'product_id'            => $this->integer(11)->unsigned()->notNull(),
            'name'                  => $this->string(255)->notNull(),
            'value'                 => $this->text(),
            'created_at'            => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_name', Tbl::product_meta, 'name');
        $this->createIndex('index_created_at', Tbl::product_meta, 'created_at');
        
        $this->createIndex('index_product_id', Tbl::product_meta, 'product_id');
        $this->addForeignKey('fk_productmeta_product_id',Tbl::product_meta, 'product_id', Tbl::product, 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::product_meta);
    }
}
