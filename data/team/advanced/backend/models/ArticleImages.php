<?php

/**
 * Team:摆烂去,NKU
 * Coding by  苏长昊 2210585 
 * This is about articles and link to one iamge
 */

namespace backend\models;

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
