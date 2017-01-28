<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_lib".
 *
 * @property integer $id
 * @property string $tag_name
 */
class TagLib extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_lib';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
        ];
    }
}
