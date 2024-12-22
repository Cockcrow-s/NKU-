<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585  陈鹏 2210558  张铮 2211751
 * This is main layout of frontend web
 */

/* @var $this yii\web\View */
/* @var $latestArticles frontend\models\Articles[] */
/* @var $recommendedVideos frontend\models\Videos[] */
/* @var $galleryImages frontend\models\Images[] */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- 欢迎信息 -->
    <div class="jumbotron text-center" style="display: flex; justify-content: space-between;">
        <div>
            <h1>AI——科技改变生活!</h1>
            <p class="lead">探索最新的文章、视频、图片</p>
        </div>

        <!-- 管理员 -->
        <div class="admin-info" style="width: 250px; text-align: left; margin-left: 30px;">
            <h3>Administrator </h3>
            <?php foreach ($admins as $admin): ?>
                <div style="margin-bottom: 20px;">
                    <p><strong>Name:</strong> <?= Html::encode($admin->username) ?></p>
                    <p><?= Html::encode($admin->email) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- GitHub 连接 -->
    <div class="github-link text-center" style="margin-top: 20px; font-size: 24px;">
        <p>GitHub: <a href="https://github.com/Cockcrow-s/NKU24-" target="_blank" style="font-size: 26px;">互联网数据库开发作业：摆烂去团队</a></p>
    </div>
    
    <br>
    <br>
    <br>

    <div class="body-content">
        <!-- 最新文章 -->
        <h2>最新文章</h2>
        <ul>
            <?php foreach (array_slice($latestArticles, 0, 3) as $article): ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['articles/view', 'id' => $article->id]) ?>">
                        <?= Html::encode($article->title) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- 推荐视频 -->
        <h2>推荐视频</h2>
        <div class="recommended-videos" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <?php foreach (array_slice($recommendedVideos, 0, 3) as $video): ?>
                <div class="col-md-12" style="flex: 1 1 calc(33.333% - 20px); max-width: calc(33.333% - 20px);">
                    <div class="embed-responsive embed-responsive-16by9" style="height: 300px; border: 1px solid #ddd;">
                        <iframe 
                            src="<?= Html::encode($video->url) ?>" 
                            class="embed-responsive-item" 
                            allowfullscreen 
                            style="width: 100%; height: 100%;">
                        </iframe>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- 图片画廊 -->
        <h2>图片画廊</h2>
        <div class="gallery" style="display: flex; flex-wrap: wrap; gap: 10px;">
            <?php foreach (array_slice($galleryImages, 0, 5) as $image): ?>
                <div style="text-align: center;">
                    <img src="<?= Html::encode($image->url) ?>" alt="Image" style="width: 150px; height: 150px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
