<?php
use app\components\helpers\Tbl;

class m000000_500091_tag extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::tag, [
            'id'                  => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'             => $this->integer(11)->unsigned(),//index, fk
            'status_id'           => $this->smallInteger(2)->notNull()->unsigned(),//index, fk
            'name'                => $this->string(50)->notNull(),
            'slug'                => $this->string(50)->unique()->defaultValue(null),
            'type'                => $this->char(3)->defaultValue(null),
            'created_at'          => $this->integer(11)->notNull(),//index
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');
                
        $this->createIndex('index_name', Tbl::tag, 'name');
        
        $this->createIndex('index_slug', Tbl::tag, 'slug');
        
        $this->createIndex('index_type', Tbl::tag, 'type');
        
        $this->createIndex('index_created_at', Tbl::tag, 'created_at');
        
        //foreign keys
        $this->createIndex('index_status_id', Tbl::tag, 'status_id');
        $this->addForeignKey('fk_tag_status_id',Tbl::tag, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_user_id', Tbl::tag, 'user_id');
        $this->addForeignKey('fk_tag_user_id',Tbl::tag, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE'); 
    }

    public function safeDown()
    {
        /** Domain Drop */
        $this->dropTable(Tbl::tag);
        # Domain Drop
    }
}
