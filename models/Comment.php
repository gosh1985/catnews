<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $text
 * @property string $created_at
 * @property integer $news_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'text', 'news_id'], 'required'],
            [['parent_id', 'user_id', 'news_id'], 'integer'],
            [['created_at'], 'safe'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'user_id' => 'User ID',
            'text' => 'Текст',
            'created_at' => 'Created At',
            'news_id' => 'News ID',
        ];
    }
}
