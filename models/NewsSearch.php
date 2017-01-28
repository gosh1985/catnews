<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    //public $tags;
    public $tag_name;

    public function rules()
    {
        return [
            [['id', 'category_id', 'count', 'rating_plus', 'rating_minus'], 'integer'],
            [['title', 'description', 'time_created', 'image'], 'safe'],
            [['tag_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find();
      //  $query->joinWith(['tags']);
         $query->joinWith(['tag_name']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'time_created' => $this->time_created,
            'count' => $this->count,
            'rating_plus' => $this->rating_plus,
            'rating_minus' => $this->rating_minus,
            'tag_name'=>$this->tag_name,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'tag_name', $this->tag_name]);

       return $dataProvider;
    }
}
