<?php
use app\components\helpers\Tbl;

class m000000_000002_hour extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::hour, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'hour'         => $this->smallInteger(2)->notNull()->unsigned()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::hour, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_hour', Tbl::hour, 'hour');

        $this->batchInsert(Tbl::hour,
            [
                'hour',
            ],
            [
                [
                    '0',
                ],
                [
                    '1',
                ],
                [
                    '2',
                ],
                [
                    '3',
                ],
                [
                    '4',
                ],
                [
                    '5',
                ],
                [
                    '6',
                ],
                [
                    '7',
                ],
                [
                    '8',
                ],
                [
                    '9',
                ],
                [
                    '10',
                ],
                [
                    '11',
                ],
                [
                    '12',
                ],
                [
                    '13',
                ],
                [
                    '14',
                ],
                [
                    '15',
                ],
                [
                    '16',
                ],
                [
                    '17',
                ],
                [
                    '18',
                ],
                [
                    '19',
                ],
                [
                    '20',
                ],
                [
                    '21',
                ],
                [
                    '22',
                ],
                [
                    '23',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::hour);
    }
}
