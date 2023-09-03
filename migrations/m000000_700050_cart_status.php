<?php
use app\components\helpers\Tbl;

class m000000_700050_cart_status extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::cart_status, [
            'id'           => $this->primaryKey(2)->notNull()->unsigned(),
            'slug'         => $this->string(25)->notNull()->unique(),
            'name'         => $this->string(25)->notNull()->unique(),
            'description'  => $this->string(255),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::cart_status, 'id', $this->smallInteger(2).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::cart_status, 'name');
        $this->createIndex('index_slug', Tbl::cart_status, 'slug');

        //New, Cart, Checkout, Paid, Complete, and Abandoned.
        $this->batchInsert(Tbl::cart_status,
            [
                'name',
                'slug',
                'description'

            ],
            [
                [
                    'New',
                    'new',
                    ''
                ],
                [
                    'Cart',
                    'cart',
                    ''
                ],
                [
                    'Checkout',
                    'checkout',
                    ''
                ],
                [
                    'Paid',
                    'paid',
                    ''
                ],
                [
                    'Complete',
                    'complete',
                    ''
                ],
                [
                    'Abandoned',
                    'abandoned',
                    ''
                ]
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::cart_status);
    }
}
