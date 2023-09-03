<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string|null $description
 *
 * @property Category[] $categories
 */
class Status extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return \app\components\helpers\Tbl::status;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'name'], 'required'],
            [['slug', 'name'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => $this->app->t('app', 'ID'),
            'slug' => $this->app->t('app', 'Slug'),
            'name' => $this->app->t('app', 'Name'),
            'description' => $this->app->t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}
