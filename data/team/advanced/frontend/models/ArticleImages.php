<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585
 * This is about images in articles
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%article_images}}".
 *
 * @property int $id
 * @property int $article_id
 * @property int $image_id
 */
class ArticleImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'image_id'], 'required'],
            [['article_id', 'image_id'], 'integer'],
        ];
    }

    public function getImage()
    {
        return $this->hasOne(Images::class, ['id' => 'image_id']);
    }


    public function getUrl()
    {
        // 通过关系访问 Images 表的 url 字段
        return $this->image ? $this->image->url : null;
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
            'image_id' => 'Image ID',
        ];
    }
}
