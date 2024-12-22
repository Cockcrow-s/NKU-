<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleVideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-videos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Videos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'article_id',
            'video_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
