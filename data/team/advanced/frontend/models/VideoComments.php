<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585 
 * This is about comments in vedios
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%video_comments}}".
 *
 * @property int $id
 * @property string $content
 * @property string|null $created_at
 * @property int $video_id
 * @property int $user_id
 */
class VideoComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_comments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'video_id', 'user_id'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['video_id', 'user_id'], 'integer'],
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
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
        ];
    }
}
