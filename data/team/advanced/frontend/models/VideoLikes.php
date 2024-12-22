<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558 
 * This is aobut  likes in vedios
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%video_likes}}".
 *
 * @property int $id
 * @property int $video_id
 * @property string|null $created_at
 * @property int $user_id
 */
class VideoLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_likes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'user_id'], 'required'],
            [['video_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['video_id', 'user_id'], 'unique', 'targetAttribute' => ['video_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
        ];
    }
}
