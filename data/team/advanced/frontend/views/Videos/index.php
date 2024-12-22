<?php


/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585  陈鹏 2210558  张铮 2211751
 * This is main layout of videos
 */


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 修改 url 列为按钮，直接跳转到 url 字段存储的地址
            [
                'label' => 'Content',
                'format' => 'raw',
                'value' => function($data) {
                    // 使用按钮跳转到 actionView，并传递视频的 ID
                    return Html::a('View Content', ['view', 'id' => $data->id], [
                        'class' => 'btn btn-primary',
                    ]);
                },
            ],
            'description:ntext',
            'created_at',

        ],
    ]); ?>


</div>
