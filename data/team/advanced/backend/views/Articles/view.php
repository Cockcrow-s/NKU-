<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558 
 * This is about artilces
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Articles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <!-- 新增评论区按钮 -->
        <?= Html::a('View Comments', ['article-comments/index', 'article_id' => $model->id], [
            'class' => 'btn btn-success',
        ]) ?>
         <!-- 新增点赞区按钮 -->
         <?= Html::a('View Thumbs-up', ['article-likes/index', 'article_id' => $model->id], [
            'class' => 'btn btn-success',
        ]) ?>
    </p >

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            // 将 content_url 改为按钮形式
            [
                'label' => 'Content URL',
                'value' => Html::a('Go to Article', $model->content_url, ['class' => 'btn btn-info', 'target' => '_blank']),
                'format' => 'raw',
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>