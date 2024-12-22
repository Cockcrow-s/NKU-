<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558
 * This is about videos
 */

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string|null $description
 * @property string|null $created_at
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'url'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }
}
