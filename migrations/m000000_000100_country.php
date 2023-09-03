<?php
use app\components\helpers\Tbl;

class m000000_000100_country extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::country, [
            'id'           => $this->primaryKey(3)->notNull()->unsigned(),
            'name'         => $this->string(50)->notNull(),
            'code'         => $this->string(3)->notNull(),
            'pos'          => $this->smallInteger(3)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::country, 'id', $this->smallInteger(3).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::country, 'name');
        $this->createIndex('index_code', Tbl::country, 'code');
        $this->createIndex('index_pos', Tbl::country, 'pos');

        $this->batchInsert(Tbl::country,
            [
                'name',
                'code',
                'pos'
            ],
            [
                //Yerevan
                [
                    'Russia',
                    'RU',
                    1
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::country);
    }
}
