<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VideoLikes */

$this->title = 'Create Video Likes';
$this->params['breadcrumbs'][] = ['label' => 'Video Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
