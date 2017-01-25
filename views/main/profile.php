<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
//echo $model->user->profile->first_name.'+';
?>
<div class="main-profile">

  <?php
    Modal::begin([
    'header' => '<h2>Создадим обьявление</h2>',
    'id'=>'modalAdvertCreate',
    'size'=>'modal-lg',
    ]);

    echo ' <div id="modalAdvert"></div>';

    Modal::end();
?>
  <div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="#">Мой профиль</a></li>
      <li><a href='<?= Url::to(['advert/create']) ?>'class = 'btn btn-success'id='modalButtonAdvert'>Menu 1</a></li>
      <li><a href="#">Menu 2</a></li>
      <li><a href="#">Menu 3</a></li>
    </ul>
  </div>

<!--
    <?php $form = ActiveForm::begin(); ?>
      <?php
         if($model->user)
              echo$form->field($model->user,'username');
       ?>
        <?= $form->field($model, 'birthday') ?>
        <?= $form->field($model, 'gender') ?>
        <?= $form->field($model, 'avatar') ?>
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'second_name') ?>
        <?= $form->field($model, 'middle_name') ?>
        <?= $form->field($model, 'user_id') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
-->
</div><!-- main-profile -->
