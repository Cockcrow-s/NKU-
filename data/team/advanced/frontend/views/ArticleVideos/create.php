<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArticleVideos */

$this->title = 'Create Article Videos';
$this->params['breadcrumbs'][] = ['label' => 'Article Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-videos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
