<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArticleLikes */

$this->title = 'Create Article Likes';
$this->params['breadcrumbs'][] = ['label' => 'Article Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
