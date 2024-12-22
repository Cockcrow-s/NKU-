<?php

/**
 * Team:摆烂去,NKU
 * Coding by 张铮 2211751
 * This is about likes of aiticles
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%article_likes}}".
 *
 * @property int $id
 * @property int $article_id
 * @property string|null $created_at
 * @property int $user_id
 */
class ArticleLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_likes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id'], 'required'],
            [['article_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['article_id', 'user_id'], 'unique', 'targetAttribute' => ['article_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
        ];
    }
}
