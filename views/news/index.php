<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\NewsSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var \app\models\News $news
 */

$dataProvider->models;
$this->title = 'Новости';
?>

<main>

    <section class="py-5 text-center container">
        <?php foreach ($dataProvider->models as $new):
            if ($new->type == \app\models\ref_types::MAIN_NEWS): ?>
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light"><?php echo $new->header ?></h1>
                        <p class="lead text-muted"><?php echo $new->main ?></p>
                    </div>
                </div>
                <?php
                break;
            endif ?>
        <?php endforeach; ?>
    </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($dataProvider->models as $new): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <h4><?php echo $new->header ?></h4>
                                <p class="card-text"><?php echo $new->main ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Подробнее
                                        </button>
                                    </div>
                                    <small class="text-muted">Дата публикации: <?php echo $new->created_at ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</main>
