<?php
use app\components\helpers\Tbl;

class m000000_000010_timezone extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::timezone, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'code'         => $this->integer(6)->notNull(),
            'name'         => $this->string(255),
            'description'  => $this->text(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::timezone, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex("index_code", Tbl::timezone, 'code');
        $this->createIndex("index_name", Tbl::timezone, 'name');

        $this->batchInsert(Tbl::timezone,
            [
                'code',
                'name'
            ],
            [
                [
                    -43200,
                    'UTC-12'
                ],
                [
                    -39600,
                    'UTC-11'
                ],
                [
                    -36000,
                    'UTC-10'
                ],
                [
                    -34200,
                    'UTC-9:30'
                ],
                [
                    -32400,
                    'UTC-9'
                ],
                [
                    -28800,
                    'UTC-8'
                ],
                [
                    -25200,
                    'UTC-7'
                ],
                [
                    -21600,
                    'UTC-6',
                ],
                [
                    -18000,
                    'UTC-5'
                ],
                [
                    -14400,
                    'UTC-4'
                ],
                [
                    -12600,
                    'UTC-3:30'
                ],
                [
                    -10800,
                    'UTC-3'
                ],
                [
                    -7200,
                    'UTC-2'
                ],
                [
                    -3600,
                    'UTC-1'
                ],
                [
                    0,
                    'UTC+0'
                ],
                [
                    3600,
                    'UTC+1'
                ],
                [
                    7200,
                    'UTC+2'
                ],
                [
                    10800,
                    'UTC+3'
                ],
                [
                    12600,
                    'UTC+3:30'
                ],
                [
                    14400,
                    'UTC+4'
                ],
                [
                    16200,
                    'UTC+4:30'
                ],
                [
                    18000,
                    'UTC+5'
                ],
                [
                    19800,
                    'UTC+5:30'
                ],
                [
                    20700,
                    'UTC+5:45'
                ],
                [
                    21600,
                    'UTC+6'
                ],
                [
                    23400,
                    'UTC+6:30'
                ],
                [
                    25200,
                    'UTC+7'
                ],
                [
                    28800,
                    'UTC+8'
                ],
                [
                    31500,
                    'UTC+8:45'
                ],
                [
                    32400,
                    'UTC+9'
                ],
                [
                    34200,
                    'UTC+9:30'
                ],
                [
                    36000,
                    'UTC+10'
                ],
                [
                    37800,
                    'UTC+10:30'
                ],
                [
                    39600,
                    'UTC+11'
                ],
                [
                    43200,
                    'UTC+12'
                ],
                [
                    46800,
                    'UTC+13'
                ],
                [
                    49500,
                    'UTC+13:45'
                ],
                [
                    50400,
                    'UTC+14'
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::timezone);
    }
}
