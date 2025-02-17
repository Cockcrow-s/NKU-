<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558 
 * This is about videocomments
 */

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VideoComments;

/**
 * VideoCommentsSearch represents the model behind the search form of `backend\models\VideoComments`.
 */
class VideoCommentsSearch extends VideoComments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'video_id', 'user_id'], 'integer'],
            [['content', 'created_at'], 'safe'],
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
        $query = VideoComments::find();

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
            'created_at' => $this->created_at,
            'video_id' => $this->video_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
