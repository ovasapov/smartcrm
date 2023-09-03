<?php
use app\components\helpers\Tbl;

class m000000_000009_language extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::language, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'code'         => $this->string(5)->notNull()->unique(),
            'name'         => $this->string(50)->notNull()->unique(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::language, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_code', Tbl::language, 'code');
        $this->createIndex('index_name', Tbl::language, 'name');

        $this->batchInsert(Tbl::language,
            [
                'code',
                'name',
            ],
            [
                [
                    'ru',
                    'Русский',
                ],
                [
                    'en',
                    'English',
                ]
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::language);
    }
}
