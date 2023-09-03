<?php
use app\components\helpers\Tbl;

class m000000_000006_day extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::day, [
            'id'          => $this->primaryKey(1)->notNull()->unsigned(),
            'day'         => $this->string(10)->notNull()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::day, 'id', $this->smallInteger(1).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_day', Tbl::day, 'day');

        $this->batchInsert(Tbl::day,
            [
                'day',
            ],
            [
                [
                    'Monday',
                ],
                [
                    'Tuesday',
                ],
                [
                    'Wednesday',
                ],
                [
                    'Thursday',
                ],
                [
                    'Friday',
                ],
                [
                    'Saturday',
                ],
                [
                    'Sunday',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::day);
    }
}
