<?php
use app\components\helpers\Tbl;

class m000000_500010_user_meta extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::user_meta, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->unsigned()->notNull(),
            'name'                  => $this->string(255)->notNull(),
            'value'                 => $this->text(),
            'created_at'            => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_name', Tbl::user_meta, 'name');
        $this->createIndex('index_created_at', Tbl::user_meta, 'created_at');
        
        $this->createIndex('index_user_id', Tbl::user_meta, 'user_id');
        $this->addForeignKey('fk_usermeta_user_id',Tbl::user_meta, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');
        
        /** User Inserts */
        $this->batchInsert(Tbl::user_meta,
            [
                'user_id',
                'name',
                'value',
                'created_at',
            ],
            [
                [
                    1,
                    'updated_at',
                    time(),
                    time(),
                ],
            ]
        );
        # User Inserts
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::user_meta);
    }
}
