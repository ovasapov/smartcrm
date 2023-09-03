<?php
use app\components\helpers\Tbl;

class m000000_590000_store extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::store, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'name'                  => $this->string(75)->notNull(),
            'slogan'                => $this->string(100),
            'site'                  => $this->string(100)->notNull()->unique(),
            'created_at'            => $this->integer(11)->unsigned()->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::store, 'user_id');
        $this->addForeignKey('fk_store_user_id',Tbl::store, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::store, 'status_id');
        $this->addForeignKey('fk_store_status_id',Tbl::store, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_name', Tbl::store, 'name');
        $this->createIndex('index_slogan', Tbl::store, 'slogan');
        $this->createIndex('index_site', Tbl::store, 'site');
        $this->createIndex('index_created_at', Tbl::store, 'created_at');
        
        /** Store Inserts */
        $this->batchInsert(Tbl::store,
            [
                'user_id',
                'status_id',
                'name',
                'site',
                'created_at',
            ],
            [
                [
                    1,
                    1,
                    'Smart Crm',
                    'smartcrm.ru',
                    time(),
                ],
            ]
        );
        # User Inserts
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::store);
    }
}
