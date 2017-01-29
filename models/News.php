<?php

namespace app\models;

use Yii;
use app\models\TagNews;
use app\models\TagLib;

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
            [['image'], 'string', 'max' => 255],
            [['tag_list'], 'safe'],
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
            'title' => '',
            'description' => 'Description',
            'time_created' => 'Time Created',
            'count' => 'Count',
            'rating_plus' => 'Rating Plus',
            'rating_minus' => 'Rating Minus',
            'image' => 'Image',
            'tags'=>'Tags',
            'tag_name'=>'',
        ];
    }

    public function behaviors()
  {
      return [
          [
              'class' => \app\components\ManyHasManyBehavior::className(),
              'relations' => [
                  'tags' => 'tag_list',
              ],
          ],
      ];
  }

   public function getTags()
    {
        return $this->hasMany(TagLib::className(), ['id' => 'tag_id'])
             ->viaTable('{{%tag_news}}', ['news_id' => 'id']);
    }

    public function getCategory(){
    return $this->hasOne(Category::className(),['id'=>'category_id']);
  }

  public function gettag_name()
   {
       return $this->hasMany(TagLib::className(), ['id' => 'tag_id'])
            ->viaTable('{{%tag_news}}', ['news_id' => 'id']);
   }


}
