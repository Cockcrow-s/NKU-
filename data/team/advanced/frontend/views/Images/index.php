<?php


/**
 * Team:摆烂去,NKU
 * Coding by 张铮 2211751
 * This is  about images
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'description', // 显示 description（图片文件名）

        [
            'label' => 'View Image',
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a('View Image', $data->imageUrl, [
                    'class' => 'btn btn-primary',
                    'target' => '_blank',
                ]);
            },
        ],
    ],
]); ?>


</div>
