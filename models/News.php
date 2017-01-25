<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $time_created
 * @property integer $count
 * @property integer $rating_plus
 * @property integer $rating_minus
 * @property string $image
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'description', 'image'], 'required'],
            [['category_id', 'count', 'rating_plus', 'rating_minus'], 'integer'],
            [['time_created'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'time_created' => 'Time Created',
            'count' => 'Count',
            'rating_plus' => 'Rating Plus',
            'rating_minus' => 'Rating Minus',
            'image' => 'Image',
        ];
    }
}
