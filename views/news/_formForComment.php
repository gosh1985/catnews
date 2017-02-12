<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-sm-5" style="background-color:white;">
<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php   echo $form->field($model, 'text')->widget(CKEditor::className(),[
   'editorOptions' => [
       'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
       'inline' => false, //по умолчанию false
   ],
]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
