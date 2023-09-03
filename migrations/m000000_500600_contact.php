<?php
#ok
use app\components\helpers\Tbl;

class m000000_500600_contact extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::contact, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id'               => $this->integer(11)->notNull()->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'name'                  => $this->string(100)->notNull(),
            'last'                  => $this->string(50),
            'middle'                => $this->string(50),
            'email'                 => $this->string(50),
            'phone'                 => $this->string(15),
            'mobile'                => $this->string(15),
            'created_at'            => $this->integer(11)->notNull(),
            'updated_at'            => $this->integer(11),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_user_id', Tbl::contact, 'user_id');
        $this->addForeignKey('fk_contact_user_id',Tbl::contact, 'user_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::contact, 'status_id');
        $this->addForeignKey('fk_contact_status_id',Tbl::contact, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_name', Tbl::contact, 'name');
        $this->createIndex('index_last', Tbl::contact, 'last');
        $this->createIndex('index_middle', Tbl::contact, 'middle');
        $this->createIndex('index_email', Tbl::contact, 'email');
        $this->createIndex('index_phone', Tbl::contact, 'phone');
        $this->createIndex('index_mobile', Tbl::contact, 'mobile');
        $this->createIndex('index_created_at', Tbl::contact, 'created_at');
        $this->createIndex('index_updated_at', Tbl::contact, 'updated_at');
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::contact);
    }
}
