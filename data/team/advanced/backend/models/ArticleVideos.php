<?php

/**
 * Team:摆烂去,NKU
 * Coding by  苏长昊 2210585 
 * This is about articles and link to one vedio
 */

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%article_videos}}".
 *
 * @property int $id
 * @property int $article_id
 * @property int $video_id
 */
class ArticleVideos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'video_id'], 'required'],
            [['article_id', 'video_id'], 'integer'],
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
            'video_id' => 'Video ID',
        ];
    }
}
