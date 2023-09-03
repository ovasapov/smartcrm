<?php
use app\components\helpers\Tbl;

class m000000_000030_status extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::status, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'slug'         => $this->string(25)->notNull()->unique(),
            'name'         => $this->string(25)->notNull()->unique(),
            'description'  => $this->string(255),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::status, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::status, 'name');
        $this->createIndex('index_slug', Tbl::status, 'slug');

        $this->batchInsert(Tbl::status,
            [
                'name',
                'slug',
                'description'

            ],
            [
                [
                    'Publish',
                    'publish',
                    'Viewable by everyone.'
                ],
                [
                    'Pending',
                    'pending',
                    'Waiting for confirmation.'
                ],
                [
                    'Trash',
                    'trash',
                    'Removed items.'
                ],
                [
                    'Draft',
                    'draft',
                    'Incomplete action.'
                ],
                [
                    'Future',
                    'future',
                    'Scheduled to be published in a future date.'
                ],
                [
                    'On hold',
                    'on-hold',
                    'Warnings, notifications and errors.'
                ]
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::status);
    }
}
