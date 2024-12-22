<?php

/**
 * Team:摆烂去,NKU
 * Coding by  苏长昊 2210585 
 * This is about articles and link to one vedio
 */

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ArticleImages;

/**
 * ArticleImagesSearch represents the model behind the search form of `backend\models\ArticleImages`.
 */
class ArticleImagesSearch extends ArticleImages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'image_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ArticleImages::find();

        // add conditions that should always apply here

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
            'article_id' => $this->article_id,
            'image_id' => $this->image_id,
        ]);

        return $dataProvider;
    }
}
