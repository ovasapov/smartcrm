<?php
use app\components\helpers\Tbl;

class m000000_590050_warehouse extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::warehouse, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'store_id'              => $this->integer(11)->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'name'                  => $this->string(75)->notNull(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_store_id', Tbl::warehouse, 'store_id');
        $this->addForeignKey('fk_warehouse_store_id',Tbl::warehouse, 'store_id', Tbl::store, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_user_id', Tbl::warehouse, 'user_id');
        $this->addForeignKey('fk_warehouse_user_id',Tbl::warehouse, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::warehouse, 'status_id');
        $this->addForeignKey('fk_warehouse_status_id',Tbl::warehouse, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_name', Tbl::warehouse, 'name');
        $this->createIndex('index_created_at', Tbl::warehouse, 'created_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::warehouse);
    }
}
