<?php
#ok
use app\components\helpers\Tbl;

class m000000_600200_address extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::address, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned(),
            'store_id'              => $this->integer(11)->unsigned(),
            'warehouse_id'          => $this->integer(11)->unsigned(),
            'city_id'               => $this->smallInteger(5)->notNull()->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'street'                => $this->string(100)->notNull(),
            'line1'                 => $this->string(50)->notNull(),
            'line2'                 => $this->string(50),
            'postal'                => $this->string(50),
            'entrance'              => $this->smallInteger(2),
            'floor'                 => $this->smallInteger(2),
            'intercom'              => $this->string(50),
            'map'                   => $this->string(255),
            'lat'                   => $this->decimal(10.8),
            'long'                  => $this->decimal(11.8),
            'created_at'            => $this->integer(11)->notNull(),
            'updated_at'            => $this->integer(11),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::address, 'user_id');
        $this->addForeignKey('fk_address_user_id',Tbl::address, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_city_id', Tbl::address, 'city_id');
        $this->addForeignKey('fk_address_city_id',Tbl::address, 'city_id', Tbl::city, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::address, 'status_id');
        $this->addForeignKey('fk_address_status_id',Tbl::address, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_street', Tbl::address, 'street');
        $this->createIndex('index_line1', Tbl::address, 'line1');
        $this->createIndex('index_line2', Tbl::address, 'line2');
        $this->createIndex('index_postal', Tbl::address, 'entrance');
        $this->createIndex('index_entrance', Tbl::address, 'entrance');
        $this->createIndex('index_floor', Tbl::address, 'floor');
        $this->createIndex('index_intercom', Tbl::address, 'intercom');
        $this->createIndex('index_map', Tbl::address, 'map');
        $this->createIndex('index_lat', Tbl::address, 'lat');
        $this->createIndex('index_long', Tbl::address, 'long');
        $this->createIndex('index_created_at', Tbl::address, 'created_at');
        $this->createIndex('index_updated_at', Tbl::address, 'updated_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::address);
    }
}
