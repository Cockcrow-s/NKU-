<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm; // 引入正确的 ActiveForm 类

/* @var $this yii\web\View */
/* @var $model common\models\LoginForm */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'enableClientValidation' => true,  // 开启客户端验证
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        
        <?= $form->field($model, 'password')->passwordInput() ?>
        
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

