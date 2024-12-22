<?php

/**
 * Team:摆烂去,NKU
 * Coding by 陈鹏 2210558
 * This is about videos
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Videos */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="videos-view">

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
        <?= Html::a('View Comments', ['video-comments/index', 'video_id' => $model->id], [
            'class' => 'btn btn-success',
        ]) ?>
         <!-- 新增点赞区按钮 -->
         <?= Html::a('View Thumbs-up', ['video-likes/index', 'video_id' => $model->id], [
            'class' => 'btn btn-success',
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:url',
            'description:ntext',
            'created_at',
        ],
    ]) ?>

</div>
