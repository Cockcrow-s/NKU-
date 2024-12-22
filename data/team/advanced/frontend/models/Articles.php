<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558
 * This is about  aiticles
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content_url
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ArticleImages[] $articleImages
 * @property ArticleVideos[] $articleVideos
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content_url'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'content_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content_url' => 'Content Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
    * 允许通过 images 属性访问 getArticleImages()
    * @return \yii\db\ActiveQuery
    */
    public function getImages()
    {
        return $this->getArticleImages();
    }


    /**
    * 允许通过 images 属性访问 getArticleImages()
    * @return \yii\db\ActiveQuery
    */
    public function getVideos()
    {
        return $this->getArticleVideos();
    }

    /**
     * 获取文章关联的图片
     * @return \yii\db\ActiveQuery
     */
    public function getArticleImages()
    {
        return $this->hasMany(ArticleImages::class, ['article_id' => 'id'])->with('image');
    }

    /**
     * 获取文章关联的视频
     * @return \yii\db\ActiveQuery
     */
    public function getArticleVideos()
    {
        return $this->hasMany(ArticleVideos::class, ['article_id' => 'id'])->with('video');
    }
}
