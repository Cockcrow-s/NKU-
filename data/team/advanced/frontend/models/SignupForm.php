<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Users;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['username', 'string', 'min' => 4, 'max' => 24],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs up a user.
     *
     * @return Users|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->password; // 存储明文密码
            return $user->save() ? $user : null;
        }

        return null;
    }
}
