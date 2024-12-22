<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Users;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    // 修改 validatePassword 方法
    public function validatePassword($attribute, $params)
    {
        echo "validatePassword called.<br>";
        // 获取用户对象
        $user = $this->getUser();
            // 调试输出echo "Input Password: " . $this->password . "<br>";
            // 检查存储密码是否正确
        echo "Input Password: " . $this->password . "<br>";
        echo "Stored Password: " . $user->password . "<br>";
        if (!$user || $this->password !== $user->password) {
        // 添加验证错误信息
            $this->addError($attribute, 'Incorrect username or password.');
            return false;
        }
        return true;
    }

    public function load($data, $formName = null)
    {
        // 获取表单名称，默认为类名
        $formName = $formName ?: $this->formName();

        if ($formName === '' && isset($data)) {
            // 无表单名，直接加载
            foreach ($data as $name => $value) {
                if ($this->hasProperty($name)) {
                    $this->$name = $value;
                }
            }
            return true;
        } elseif (isset($data[$formName])) {
            // 有表单名的情况
            foreach ($data[$formName] as $name => $value) {
                if ($this->hasProperty($name)) {
                    $this->$name = $value;
                }
            }
            return true;
        }
        return false;
    }
    // 登录逻辑
    public function login()
    {
        // 获取用户对象
        $user = $this->getUser();
        if ($user === null) {
            return false;
        }
        
        // 调用 validatePassword 方法进行密码验证
        if (!$this->validatePassword('password', [])) {
            return false;
        }
    
        // 调用 Yii::$app->user->login
        if (Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0)) {
            return true;
        } else {
            return false;
        }
    }

    // 获取用户对象
    public function getUser()
    {
        //echo 'getUser method called.<br>';
            // 调试输出
        echo "Getting user for username: " . $this->username . "<br>";
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }
            // 调试输出
        echo "User object: ";
        var_dump($this->_user);

        return $this->_user;
    }
    
    
    
    // 输出到浏览器控制台的日志
    private function logToConsole($message)
    {
        $js = "console.log('Yii2 Log: " . addslashes($message) . "');";
        Yii::$app->view->registerJs($js);
    }
}
