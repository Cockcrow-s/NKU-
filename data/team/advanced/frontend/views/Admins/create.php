<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Admins */

$this->title = 'Create Admins';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admins-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
