<?php
use app\components\helpers\Tbl;

class m000000_000020_business extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::business, [
            'id'           => $this->primaryKey(1)->notNull()->unsigned(),
            'name'         => $this->string(3)->notNull()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');
        
        $this->alterColumn(Tbl::business, 'id', $this->smallInteger(1).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::business, 'name');
        
        $this->batchInsert(Tbl::business,
            [
                'name',
            ],
            [
                [
                    'B2B',
                ],
                [
                    'B2C',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::business);
    }
}
