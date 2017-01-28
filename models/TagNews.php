<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_news".
 *
 * @property integer $tag_id
 * @property integer $news_id
 */
class TagNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'news_id'], 'required'],
            [['tag_id', 'news_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'news_id' => 'News ID',
        ];
    }
}
