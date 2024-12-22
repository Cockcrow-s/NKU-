<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585  陈鹏 2210558  张铮 2211751
 * This is detail of each video
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Videos */
/* @var $comments frontend\models\VideoComments[] */
/* @var $newComment frontend\models\VideoComments */
/* @var $likeCountVideo int */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="video-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::encode($model->description) ?></p>

    <!-- 视频播放器或外部链接 -->
    <?php if (strpos($model->url, 'localhost') !== false): ?>
        <!-- 如果 URL 包含 localhost，显示本地视频播放器 -->
        <video width="800" controls>
            <source src="<?= Html::encode($model->url) ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php else: ?>
        <!-- 如果 URL 不是本地链接，提供外部链接 -->
        <p>视频链接：<a href="<?= Html::encode($model->url) ?>" target="_blank">点击跳转观看视频</a></p>
    <?php endif; ?>

    <!-- 点赞功能 -->
    <div class="article-actions">
        <h3>操作</h3>
        <p>
            <?= Html::a("👍 点赞 ($likeCountVideo)", ['like', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data-method' => 'post',
            ]) ?>
        </p>
    </div>

    <!-- 评论区域 -->
    <div class="comments">
        <h3>评论</h3>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <strong>用户 <?= Html::encode($comment->user_id) ?>:</strong>
                    <p><?= Html::encode($comment->content) ?></p>
                    <p class="text-muted"><small>评论时间: <?= Html::encode($comment->created_at) ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>还没有评论，快来抢沙发吧！</p>
        <?php endif; ?>
    </div>

    <!-- 评论表单 -->
    <div class="comment-form">
        <h3>发表评论</h3>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($newComment, 'content')->textarea(['rows' => 4, 'placeholder' => '请输入您的评论...'])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
