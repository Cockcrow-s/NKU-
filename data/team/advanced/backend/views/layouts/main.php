<?php

/**
 * Team:摆烂去,NKU
 * Coding by 苏长昊 2210585  陈鹏 2210558  张铮 2211751
 * This is main layout of backend web
 */

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        .wrap {
            flex: 1;
            display: flex;
            flex-direction: row;
        }
        .sidebar {
            width: 200px;
            background-color: #f8f9fa;
            height: 100vh;
            padding: 20px 0;
            flex-shrink: 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            padding: 10px 20px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<!-- 顶部导航 -->
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>

<!-- 主体部分 -->
<div class="wrap">
    <?php if (!empty($this->params['showSidebar'])): ?>
        <div class="sidebar">
            <ul>
            <li><a href="" data-load="content-area">whitebatch</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['admins/index']) ?>" data-load="content-area">管理员信息</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['articles/index']) ?>" data-load="content-area">文章管理</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['videos/index']) ?>" data-load="content-area">视频管理</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['users/index']) ?>" data-load="content-area">用户管理</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['images/index']) ?>" data-load="content-area">图片管理</a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>" data-method="post">退出登录</a></li>
            </ul>
        </div>
    <?php endif; ?>

    <div class="content" id="content-area">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('a[data-load]');
        links.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // 阻止默认跳转
                const targetId = this.getAttribute('data-load'); // 获取目标区域的 ID
                const targetElement = document.getElementById(targetId); // 获取目标区域

                if (targetElement) {
                    fetch(this.href) // AJAX 请求目标页面
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newContent = doc.getElementById('content-area').innerHTML; // 提取新内容

                            targetElement.innerHTML = newContent; // 替换目标区域的内容
                            history.pushState(null, '', this.href); // 更新浏览器地址栏
                        })
                        .catch(error => console.error('Error loading content:', error));
                }
            });
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
