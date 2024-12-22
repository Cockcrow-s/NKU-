<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ArticleImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'article_id',
            'image_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
