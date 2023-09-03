<?php
use app\components\helpers\Tbl;

class m000000_000008_currency extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::currency, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'code'         => $this->string(5)->unique()->notNull(),
            'exchange'     => $this->float(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::currency, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_code', Tbl::currency, 'code');

        $this->batchInsert(Tbl::currency,
            [
                'code',
                'exchange',
            ],
            [
                [
                    'rub',
                    null
                ],
                [
                    'usd',
                    0.01703,
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::currency);
    }
}
