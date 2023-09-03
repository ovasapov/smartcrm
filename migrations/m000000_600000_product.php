<?php
use app\components\helpers\Tbl;

class m000000_600000_product extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::product, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'parent_id'             => $this->integer(11)->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'title'                 => $this->string(75),
            'slug'                  => $this->string(100),
            'summary'               => $this->string(255),
            'sku'                   => $this->string(50),
            'upc'                   => $this->string(50),
            'content'               => $this->text(),
            'price'                 => $this->float(8.2)->defaultValue(0.00),
            'cost'                  => $this->float(8.2)->defaultValue(0.00),
            'discount'              => $this->float(8.2)->defaultValue(0.00),
            'meta'                  => $this->json(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
            'published_at'          => $this->integer(11)->unsigned(),
            'starts_at'             => $this->integer(11)->unsigned(),
            'ends_at'               => $this->integer(11)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::product, 'user_id');
        $this->addForeignKey('fk_product_user_id',Tbl::product, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::product, 'status_id');
        $this->addForeignKey('fk_product_status_id',Tbl::product, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_parent_id', Tbl::product, 'parent_id');
        $this->addForeignKey('fk_product_parent_id',Tbl::product, 'parent_id', Tbl::product, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_title', Tbl::product, 'title');
        $this->createIndex('index_slug', Tbl::product, 'slug');
        $this->createIndex('index_summary', Tbl::product, 'summary');
        $this->createIndex('index_sku', Tbl::product, 'sku');
        $this->createIndex('index_upc', Tbl::product, 'upc');
        $this->createIndex('index_price', Tbl::product, 'price');
        $this->createIndex('index_cost', Tbl::product, 'cost');
        $this->createIndex('index_discount', Tbl::product, 'discount');
        $this->createIndex('index_created_at', Tbl::product, 'created_at');
        $this->createIndex('index_published_at', Tbl::product, 'published_at');
        $this->createIndex('index_starts_at', Tbl::product, 'starts_at');
        $this->createIndex('index_ends_at', Tbl::product, 'ends_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::product);
    }
}
