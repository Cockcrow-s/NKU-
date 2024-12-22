<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message of Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'email',
        ],
    ]); ?>


</div>
