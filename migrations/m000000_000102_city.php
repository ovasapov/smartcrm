<?php
use app\components\helpers\Tbl;

class m000000_000102_city extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::city, [
            'id'           => $this->primaryKey(5)->notNull()->unsigned(),
            'state_id'     => $this->smallInteger(5)->unsigned(),
            'country_id'   => $this->smallInteger(3)->unsigned(),
            'name'         => $this->string(50)->notNull(),
            'pos'          => $this->smallInteger(5)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::city, 'id', $this->smallInteger(5).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::city, 'name');
        $this->createIndex('index_pos', Tbl::city, 'pos');
        
        $this->createIndex('index_state_id', Tbl::city, 'state_id');
        $this->addForeignKey('fk_city_state_id',Tbl::city, 'state_id', Tbl::state, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_country_id', Tbl::city, 'country_id');
        $this->addForeignKey('fk_city_country_id',Tbl::city, 'country_id', Tbl::country, 'id', 'RESTRICT', 'CASCADE');

        $this->batchInsert(Tbl::city,
            [
                'name',
                'state_id',
                'pos'
            ],
            [
                [
                    'Moscow',
                    1,
                    1,
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::city);
    }
}
