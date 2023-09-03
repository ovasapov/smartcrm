<?php
use app\components\helpers\Tbl;

class m000000_600110_comment_meta extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::comment_meta, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'comment_id'            => $this->integer(11)->unsigned()->notNull(),
            'name'                  => $this->string(255)->notNull(),
            'value'                 => $this->text(),
            'created_at'            => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_name', Tbl::comment_meta, 'name');
        $this->createIndex('index_created_at', Tbl::comment_meta, 'created_at');
        
        $this->createIndex('index_comment_id', Tbl::comment_meta, 'comment_id');
        $this->addForeignKey('fk_commentmeta_comment_id',Tbl::comment_meta, 'comment_id', Tbl::comment, 'id', 'RESTRICT', 'CASCADE');
        
        //pros, cons
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::comment_meta);
    }
}
