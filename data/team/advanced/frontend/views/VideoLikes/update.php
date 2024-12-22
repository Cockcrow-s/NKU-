<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VideoLikes */

$this->title = 'Update Video Likes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-likes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
