<?php

/**
 * Team:摆烂去,NKU
 * Coding by 张铮 2211751
 * This is about articles
 */

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content_url
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Articles extends \yii\db\ActiveRecord
{
    private $_logicalSequence;
    //获取当前对象的逻辑序号
    public function getLogicalSequence()
    {
        if ($this->_logicalSequence === null) {
            // 查询数据库，获取比当前记录的id小的记录数量再加1，作为逻辑序号
            $count = Articles::find()
                ->where(['<', 'id', $this->id])
                ->count();
            $this->_logicalSequence = $count + 1;
        }
        return $this->_logicalSequence;
    }
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
}
