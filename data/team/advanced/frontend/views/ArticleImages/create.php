<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArticleImages */

$this->title = 'Create Article Images';
$this->params['breadcrumbs'][] = ['label' => 'Article Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
