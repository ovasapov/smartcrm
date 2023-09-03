<?php
use app\components\helpers\Tbl;

class m000000_000050_brand extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::brand, [
            'id'           => $this->primaryKey(5)->notNull()->unsigned(),
            'code'         => $this->string(50)->unique(),
            'name'         => $this->string(100)->notNull()->unique(),
            'pos'          => $this->smallInteger(5)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');
        
        $this->alterColumn(Tbl::brand, 'id', $this->smallInteger(5).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_code', Tbl::brand, 'code');
        $this->createIndex('index_name', Tbl::brand, 'name');
        $this->createIndex('index_pos', Tbl::brand, 'pos');
        
        $this->batchInsert(Tbl::brand,
            [
                'name',
            ],
            [
                [
                    'Beard Care',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::brand);
    }
}
