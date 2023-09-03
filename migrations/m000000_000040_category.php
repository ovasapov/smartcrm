<?php
use app\components\helpers\Tbl;

class m000000_000040_category extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable(Tbl::category, [
            'id'           => $this->primaryKey(5)->notNull()->unsigned(),
            'parent_id'    => $this->smallInteger(5)->unsigned(),
            'name'         => $this->string(100)->notNull()->unique(),
            'icon'         => $this->string(100),
            'slug'         => $this->string(100)->notNull()->unique(),
            'description'  => $this->text(),
            'pos'          => $this->smallInteger(5)->unsigned(),
        ], 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB');

        $this->alterColumn(Tbl::category, 'id', $this->smallInteger(5).' UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->createIndex('index_name', Tbl::category, 'name');
        $this->createIndex('index_icon', Tbl::category, 'icon');
        $this->createIndex('index_slug', Tbl::category, 'slug');
        $this->createIndex('index_pos', Tbl::category, 'pos');

        $this->createIndex('index_parent_id', Tbl::category, 'parent_id');
        $this->addForeignKey('fk_category_parent_id',Tbl::category, 'parent_id', Tbl::category, 'id', 'RESTRICT', 'RESTRICT');

        $this->batchInsert(Tbl::category,
            [
                'name',
                'icon',
                'slug'
            ],
            [
                [
                    'Camera',
                    'icon flaticon-technology',
                    'camera'
                ],
                [
                    'Game & Consoles',
                    'icon flaticon-console',
                    'game-consoles',
                ],
                [
                    'Printers & Ink',
                    'icon flaticon-print-button',
                    'printers-ink',
                ],
                [
                    'Speaker',
                    'icon flaticon-technology-1',
                    'speaker',
                ],
                [
                    'Smartphone',
                    'icon flaticon-smartphone',
                    'smartphone',
                ],
                [
                    'Accessories',
                    'icon flaticon-mouse',
                    'accessories',
                ],
                [
                    'Essentials',
                    'icon flaticon-layers',
                    'essentials',
                ],
                [
                    'Featured',
                    'icon flaticon-shapes',
                    'featured',
                ],
                [
                    'Seller',
                    'icon flaticon-shiny-diamond',
                    'seller',
                ],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable(Tbl::category);
    }
}
