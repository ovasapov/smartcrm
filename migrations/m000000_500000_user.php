<?php
#ok
use app\components\helpers\Tbl;

class m000000_500000_user extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::user, [
            'id'                    => $this->primaryKey(11)->notNull()->unsigned(),
            'parent_id'             => $this->integer(11)->unsigned(),
            'role_id'               => $this->smallInteger(2)->notNull()->unsigned(),
            'status_id'             => $this->smallInteger(2)->notNull()->unsigned()->defaultValue(1),
            'language_id'           => $this->smallInteger(2)->unsigned()->defaultValue(1),
            'timezone_id'           => $this->smallInteger(2)->unsigned()->defaultValue(18),
            'name'                  => $this->string(50),
            'lastname'              => $this->string(100),
            'middlename'            => $this->string(50),
            'username'              => $this->string(50)->notNull()->unique(),
            'auth_key'              => $this->string(32)->unique(),
            'password_hash'         => $this->string(100),
            'password_reset_token'  => $this->string(100)->unique(),
            'email'                 => $this->string(100)->notNull()->unique(),
            'phone'                 => $this->string(15)->notNull()->unique(),
            'token'                 => $this->string(100),
            'created_at'            => $this->integer(11)->notNull(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->createIndex('index_role_id', Tbl::user, 'role_id');
        $this->addForeignKey('fk_user_role_id',Tbl::user, 'role_id', Tbl::role, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_parent_id', Tbl::user, 'parent_id');
        $this->addForeignKey('fk_user_parent_id',Tbl::user, 'parent_id', Tbl::user, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_status_id', Tbl::user, 'status_id');
        $this->addForeignKey('fk_user_status_id',Tbl::user, 'status_id', Tbl::status, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_language_id', Tbl::user, 'language_id');
        $this->addForeignKey('fk_user_language_id',Tbl::user, 'language_id', Tbl::language, 'id', 'RESTRICT', 'CASCADE');
        
        $this->createIndex('index_timezone_id', Tbl::user, 'timezone_id');
        $this->addForeignKey('fk_user_timezone_id',Tbl::user, 'timezone_id', Tbl::timezone, 'id', 'RESTRICT', 'CASCADE');

        $this->createIndex('index_username', Tbl::user, 'username');
        $this->createIndex('index_auth_key', Tbl::user, 'auth_key');
        $this->createIndex('index_email', Tbl::user, 'email');
        $this->createIndex('index_phone', Tbl::user, 'phone');
        $this->createIndex('index_name', Tbl::user, 'name');
        $this->createIndex('index_lastname', Tbl::user, 'lastname');
        $this->createIndex('index_middlename', Tbl::user, 'middlename');
        $this->createIndex('index_created_at', Tbl::user, 'created_at');

        /** User Inserts */
        $this->batchInsert(Tbl::user,
            [
                'username',
                'password_hash',
                'auth_key',
                'phone',
                'email',
                'role_id',
                'parent_id',
                'created_at',
            ],
            [
                [
                    'administrator',
                    '$2y$13$GNiiWScQ7qcs629N4Hp2FuBNCcJABa6X6u6oO.39tV1hoO86vHBLC',
                    'iamadministrator',
                    '79687776664',
                    'ovasapov@gmail.com',
                    1,
                    null,
                    time(),
                ],
                [
                    'franchise',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamfranchise',
                    '79687776661',
                    'arthurxcvbvasap@gmail.com',
                    2,
                    1,
                    time(),
                ],
                [
                    'business',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamclient',
                    '79687770561',
                    'arthuxcvvasap@gmail.com',
                    3,
                    2,
                    time(),
                ],
                [
                    'consumer',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamconsumer',
                    '79687776561',
                    'arthuxcvvasap1@gmail.com',
                    4,
                    2,
                    time(),
                ],
                [
                    'manager',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iammanager',
                    '79687876661',
                    'arthurhovsdfp@gmail.com',
                    5,
                    1,
                    time(),
                ],
                [
                    'support',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamsupport',
                    '79680776669',
                    'arthurfg1vasap@gmail.com',
                    6,
                    1,
                    time(),
                ],
                [
                    'managerfranchise',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamm2anagerfranchise',
                    '79887276661',
                    'arthdfhovasap@gmail.com',
                    5,
                    2,
                    time(),
                ],
                [
                    'supportfranchise',
                    '$2y$13$3ZyzoSVUKr8ypnsVTCYGo.TE9YZ45DXF2pddp/mpWqRVs69XvTbZu',
                    'iamsupportfranchise',
                    '79687775061',
                    'arthurhosdsap@gmail.com',
                    6,
                    2,
                    time(),
                ],
            ]
        );
        # User Inserts
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::user);
    }
}
