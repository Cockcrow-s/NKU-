<?php

/**
 * Team:摆烂去,NKU
 * Coding by  张铮 2211751
 * This is about the conection of videos and articles
 */

namespace frontend\models;

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

    public function getVideo()
    {
        return $this->hasOne(Videos::class, ['id' => 'video_id']);
    }


    public function getUrl()
    {
        // 通过关系访问 Images 表的 url 字段
        return $this->video ? $this->video->url : null;
    }

    public function getArticle()
    {
        return $this->hasOne(Articles::class, ['id' => 'article_id']);
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
