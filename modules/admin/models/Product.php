<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $foto
 * @property string $data
 * @property integer $category_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'category_id'], 'required'],
            [['description'], 'string'],
            [['data'], 'safe'],
            [['file'],'file'],
            [['category_id'], 'integer'],
            [['name', 'foto'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'file' => 'Foto',
            'data' => 'Data',
            'category_id' => 'Category name',

        ];
    }
}
