<?php
namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class Users extends ActiveRecord implements IdentityInterface
{
    // 用户模型表名
    public static function tableName()
    {
        return '{{%users}}'; // 根据你的数据库表名调整
    }

    // 定义用户属性
    // public $username;
    // public $password;

    // 定义密码字段
    public $password_hash;
    public $auth_key;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'required'],
            [['password'], 'string', 'min' => 6],
        ];
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

    /**
     * 根据用户 ID 查找用户
     * 
     * @param int|string $id
     * @return static|null
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * 根据访问令牌查找用户
     * 
     * @param string $token
     * @param null $type
     * @return static|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * 获取当前用户的 ID
     * 
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 获取身份验证密钥
     * 
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * 验证身份验证密钥是否正确
     * 
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * 验证密码是否正确
     * 
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        // 如果密码是明文存储，直接比较
        return $this->password === $password;
    }

    /**
     * 设置密码
     * 
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password; // 不进行加密，直接保存明文密码
    }

    /**
     * 生成用户的认证密钥
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * 用户模型的初始化
     */
    public function init()
    {
        parent::init();
        // 自动生成 auth_key，如果没有的话
        if ($this->auth_key === null) {
            $this->generateAuthKey();
        }
    }
}
