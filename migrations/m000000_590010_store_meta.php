<?php
use app\components\helpers\Tbl;

class m000000_590010_store_meta extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::store_meta, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'store_id'              => $this->integer(11)->unsigned()->notNull(),
            'name'                  => $this->string(255)->notNull(),
            'value'                 => $this->text(),
            'created_at'            => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_name', Tbl::store_meta, 'name');
        $this->createIndex('index_created_at', Tbl::store_meta, 'created_at');
        
        $this->createIndex('index_store_id', Tbl::store_meta, 'store_id');
        $this->addForeignKey('fk_store_meta_store_id',Tbl::store_meta, 'store_id', Tbl::store, 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::store_meta);
    }
}
