<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\TagLib;
use nex\chosen\Chosen;


/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
   ArrayHelper::map(Category::find()->all(),'id','name'),
   ['prompt'=>'-Choose a Category-',
   ]);?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= Chosen::widget([
    'model' => $model,
    'attribute' => 'tag_list',
    'items' => ArrayHelper::map(
        TagLib::find()->select('id, tag_name')->orderBy('tag_name')->asArray()->all(),
        'id',
        'tag_name'
    ),
    'multiple' => true,
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
