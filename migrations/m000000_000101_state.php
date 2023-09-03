<?php
use app\components\helpers\Tbl;

class m000000_000101_state extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::state, [
            'id'           => $this->primaryKey(5)->notNull()->unsigned(),
            'country_id'   => $this->smallInteger(3)->notNull()->unsigned(),
            'name'         => $this->string(50)->notNull(),
            'pos'          => $this->smallInteger(5)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::state, 'id', $this->smallInteger(5).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::state, 'name');
        $this->createIndex('index_pos', Tbl::state, 'pos');

        $this->createIndex('index_country_id', Tbl::state, 'country_id');
        $this->addForeignKey('fk_state_country_id',Tbl::state, 'country_id', Tbl::country, 'id', 'RESTRICT', 'RESTRICT');

        $this->batchInsert(Tbl::state,
            [
                'name',
                'country_id',
                'pos'
            ],
            [
                [
                    'Moscow',
                    1,
                    1
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::state);
    }
}
