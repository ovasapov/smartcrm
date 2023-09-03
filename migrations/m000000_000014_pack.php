<?php
use app\components\helpers\Tbl;

class m000000_000014_pack extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::pack, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'slug'         => $this->string(25)->notNull(),
            'name'         => $this->string(25)->notNull(),
            'description'  => $this->text(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::pack, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::pack, 'name');

        $this->batchInsert(Tbl::pack,
            [
                'slug',
                'name',
            ],
            [
                [
                    'lite',
                    'Lite'
                ],
                [
                    'standard',
                    'Standard'
                ],
                [
                    'premium',
                    'Premium'
                ],
                [
                    'master',
                    'Master'
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::pack);
    }
}
