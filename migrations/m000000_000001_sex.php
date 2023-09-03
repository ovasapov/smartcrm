<?php
use app\components\helpers\Tbl;

class m000000_000001_sex extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::sex, [
            'id'           => $this->primaryKey(1)->notNull()->unsigned(),
            'name'         => $this->string(10)->notNull()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::sex, 'id', $this->smallInteger(1).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::sex, 'name');

        $this->batchInsert(Tbl::sex,
            [
                'name',
            ],
            [
                [
                    'Male',
                ],
                [
                    'Female',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::sex);
    }
}
