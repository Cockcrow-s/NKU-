<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585
 * This is about images
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%images}}".
 *
 * @property int $id
 * @property string $url
 * @property string|null $description
 * @property string|null $created_at
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }
    public function getImageUrl()
    {
        // 使用 description 属性中的文件名，添加 .jpg 扩展名，生成正确的图片 URL
        return '/advanced/resources/pictures/' . $this->description . '.jpg';
    }
    
}
