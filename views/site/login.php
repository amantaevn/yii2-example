<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
?>
<section>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Авторизация</p>
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <?= $form->field($model, 'password')->passwordInput() ?>
                                    </div>
                                </div>
                                <div class="justify-content-center">
                                    <?= $form->field($model, 'rememberMe')->checkbox(['template']);?>
                                </div>
                                <div class="justify-content-center mb-3">
                                    Если вы забыли пароль нажмите на <?= Html::a('сбросить пароль', ['site/request-password-reset']) ?>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
