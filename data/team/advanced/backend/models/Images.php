<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585
 * This is about images
 */

namespace backend\models;

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
}
