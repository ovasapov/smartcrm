<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property string|null $imgs
 * @property string $slug
 * @property string|null $description
 * @property int|null $parent_id
 * @property int $status_id
 *
 * @property Category[] $categories
 * @property Category $parent
 * @property Status $status
 */
class Category extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return \app\components\helpers\Tbl::category;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['parent_id', 'status_id'], 'integer'],
            [['name', 'icon', 'slug'], 'string', 'max' => 100],
            [['imgs'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => $this->app->t('app', 'ID'),
            'name' => $this->app->t('app', 'Name'),
            'icon' => $this->app->t('app', 'Icon'),
            'imgs' => $this->app->t('app', 'Imgs'),
            'slug' => $this->app->t('app', 'SLug'),
            'description' => $this->app->t('app', 'Description'),
            'parent_id' => $this->app->t('app', 'Parent'),
            'status_id' => $this->app->t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery|StatusQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
