<?php
use app\components\helpers\Tbl;

class m000000_000017_role extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::role, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'name'         => $this->string(25)->notNull()->unique(),
            'description'  => $this->string(255),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::role, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::role, 'name');

        $this->batchInsert(Tbl::role,
            [
                'name',
            ],
            [
                [
                    'Administrator',//1
                ],
                [
                    'Franchise',//2
                ],
                [
                    'Business',//3
                ],
                [
                    'Consumer',//4
                ],
                [
                    'Manager',//5
                ],
                [
                    'Support',//6
                ],
                [
                    'Guest',//7
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::role);
    }
}
