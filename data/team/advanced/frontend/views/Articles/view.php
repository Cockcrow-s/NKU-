<?php

/**
 * Team:摆烂去,NKU
 * Coding by 张铮 2211751
 * This is detail of each article
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Articles */
/* @var $newComment frontend\models\ArticleComments */
/* @var $comments frontend\models\ArticleComments[] */
/* @var $likeCount int */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="articles-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <!-- 文章内容 -->
    <div class="article-content">
        <h2>文章内容</h2>
        <div class="iframe-container" style="width: 100%; height: 600px; border: 1px solid #ddd; margin-bottom: 20px;">
            <iframe 
                src="<?= $model->content_url ?>" 
                style="width: 100%; height: 100%; border: none;" 
                title="文章内容">
            </iframe>
        </div>
    </div>

    <!-- 显示图片 -->
<div class="article-images">
    <h3>相关图片</h3>
    <?php if (!empty($images)): ?>
        <div class="row">
            <?php foreach ($images as $image): ?>
                <div class="col-md-3 text-center">
                    <img src="<?= Html::encode($image->url) ?>" class="img-thumbnail" alt="文章图片" style="max-height: 150px;">
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>暂无相关图片。</p>
    <?php endif; ?>
</div>

<!-- 显示视频 -->
<div class="article-videos">
    <h3>相关视频</h3>
    <?php if (!empty($videos)): ?>
        <div class="row">
            <?php foreach ($videos as $video): ?>
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe 
                            src="<?= Html::encode($video->url) ?>" 
                            class="embed-responsive-item" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>暂无相关视频。</p>
    <?php endif; ?>
</div>

    <!-- 点赞功能 -->
    <div class="article-actions">
        <h3>操作</h3>
        <p>
            <?= Html::a("👍 点赞 ($likeCount)", ['like', 'id' => $model->id], [
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
