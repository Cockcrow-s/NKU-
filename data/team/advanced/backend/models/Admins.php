<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585
 * This is about admins
 */

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Admins extends ActiveRecord implements IdentityInterface
{
    /**
     * 指定表名
     */
    public static function tableName()
    {
        return '{{%admins}}';
    }

    /**
     * 根据 ID 查找用户
     *
     * @param int|string $id
     * @return static|null
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * 根据 Access Token 查找用户（如果不需要，可以直接返回 null）
     *
     * @param string $token
     * @param null $type
     * @return static|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // 如果不使用 Access Token，可以直接返回 null
    }

    /**
     * 获取用户 ID
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 获取认证密钥（如果不需要，可以直接返回 null）
     *
     * @return string|null
     */
    public function getAuthKey()
    {
        return null; // 如果不使用 Auth Key，可以直接返回 null
    }

    /**
     * 验证认证密钥（如果不需要，可以直接返回 false）
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return false; // 如果不使用 Auth Key，可以直接返回 false
    }

    /**
     * 验证密码
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->password === $password; // 明文密码直接比对
    }

    /**
     * 根据用户名查找用户
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

}
