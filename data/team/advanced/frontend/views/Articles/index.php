<?php


/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585
 * This is main layout of articles
 */


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'created_at',
            'updated_at',

            // 显示内容按钮
            [
                'label' => 'Content',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::button('View Content', [
                        'class' => 'btn btn-primary',
                        'onclick' => 'window.location.href="' . Yii::$app->urlManager->createUrl(['articles/view', 'id' => $data->id]) . '"'
                    ]);
                },
            ],

            // 添加关联图片显示
           /* [
                'label' => 'Images',
                'format' => 'raw',
                'value' => function($data) {
                    $images = '';
                    foreach ($data->articleImages as $articleImage) {
                        $images .= Html::img($articleImage->image->url, [
                            'style' => 'width:50px; margin-right:5px;',
                            'alt' => 'Image'
                        ]);
                    }
                    return $images ?: 'No Images';
                },
            ],

            // 添加关联视频显示
            [
                'label' => 'Videos',
                'format' => 'raw',
                'value' => function($data) {
                    $videos = '';
                    foreach ($data->articleVideos as $articleVideo) {
                        $videos .= Html::tag('video', 
                            Html::tag('source', '', [
                                'src' => $articleVideo->video->url,
                                'type' => 'video/mp4'
                            ]), [
                            'width' => '80px',
                            'height' => '50px',
                            'controls' => true,
                            'style' => 'margin-right:5px;'
                        ]);
                    }
                    return $videos ?: 'No Videos';
                },
            ],*/
        ],
    ]); ?>

</div>
