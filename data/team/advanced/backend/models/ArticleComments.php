<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%article_comments}}".
 *
 * @property int $id
 * @property string $content
 * @property string|null $created_at
 * @property int $article_id
 * @property int $user_id
 */
class ArticleComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_comments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'article_id', 'user_id'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['article_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'article_id' => 'Article ID',
            'user_id' => 'User ID',
        ];
    }
}
