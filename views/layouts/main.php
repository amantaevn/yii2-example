<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header" class="d-flex justify-content-center py-2">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                //'options' => ['class' => 'd-flex flex-wrap align-items-center justify-content-center justify-content-lg-start']
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index'], 'class' => 'nav-link px-2 text-secondary'],
                ['label' => 'About', 'url' => ['/site/about'], 'class' => 'nav-link px-2 text-secondary'],
                ['label' => 'Contact', 'url' => ['/site/contact'], 'class' => 'nav-link px-2 text-secondary'],
                ['label' => 'Test', 'url' => ['/site/entry'], 'class' => 'nav-link px-2 text-secondary'],
                ['label' => 'Новости', 'url' => ['/news/index'], 'class' => 'nav-link px-2 text-secondary'],
            ];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login'], 'class' => 'nav-link active'];
                $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup'], 'class' => 'btn btn-primary'];
            } else {
                $menuItems[] = ['label' => 'CRUD', 'url' => ['/country/index'], 'class' => 'nav-link px-2 text-secondary'];
                $menuItems[] =
                '<div class="dropdown text-end">' .
                    '<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">' .
                        '   ' . Yii::$app->user->identity->username .
                    '</a>' .
                    '<ul class="dropdown-menu text-small" data-popper-placement="bottom-start">' .
                        '<li><a class="dropdown-item" href="http://test/basic/web/index.php?r=site%2Flogout">Личный кабинет</a></li>' .
                        '<li><a class="dropdown-item" href="http://test/basic/web/index.php?r=site%2Flogout">Личный кабинет</a></li>' .
                        '<li><a class="dropdown-item" href="http://test/basic/web/index.php?r=site%2Flogout">Личный кабинет</a></li>' .
                        '<li><a class="dropdown-item" href="http://test/basic/web/index.php?r=site%2Flogout">Личный кабинет</a></li>' .
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton('Выйти', ['class' => 'btn btn-primary'])
                        . Html::endForm() .
                        '</li>' .
                    '</ul>' .
                '</div>';
            }

            echo Nav::widget([
                'options' => ['class' => 'nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0'],
                'items' => $menuItems,
            ]);

            NavBar::end();
            ?>
</header>
<!--<div class="dropdown text-end">
    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 34.4444px);" data-popper-placement="bottom-start">
        <li><a class="dropdown-item" href="http://test/basic/web/index.php?r=site%2Flogin">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
</div>-->
<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
