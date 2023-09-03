<?php
use app\components\helpers\Tbl;

class m000000_000007_month extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::month, [
            'id'            => $this->primaryKey(2)->notNull()->unsigned(),
            'month'         => $this->string(10)->notNull()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::month, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_month', Tbl::month, 'month');

        $this->batchInsert(Tbl::month,
            [
                'month',
            ],
            [
                [
                    'January',
                ],
                [
                    'February',
                ],
                [
                    'March',
                ],
                [
                    'April',
                ],
                [
                    'May',
                ],
                [
                    'June',
                ],
                [
                    'July',
                ],
                [
                    'August',
                ],
                [
                    'September',
                ],
                [
                    'October',
                ],
                [
                    'November',
                ],
                [
                    'December',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::month);
    }
}
