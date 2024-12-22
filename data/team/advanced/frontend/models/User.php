<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}'; // 确保这是你的数据库表名
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param int|string $id
     * @return IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]); // 基于主键查找用户
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token
     * @param null $type
     * @return IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // 如果不使用 token 验证，返回 null
        return null;
    }

    /**
     * Returns the ID of the current user.
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id; // 返回用户 ID
    }

    /**
     * Returns the authentication key.
     *
     * @return string|null
     */
    public function getAuthKey()
    {
        // 如果不使用 auth_key，可以返回 null
        return null;
    }

    /**
     * Validates the authentication key.
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        // 如果不使用 auth_key，总是返回 false
        return false;
    }

    /**
     * Validates the password.
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->password === $password; // 明文密码直接对比
    }
}
