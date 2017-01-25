<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AdvertSearch;
use app\models\Advert;
use app\models\Cities;
use kartik\typeahead\TypeaheadBasic;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\AdvertSearch */
/* @var $form yii\widgets\ActiveForm */


$nameCity = ArrayHelper::getColumn(Cities::find()->all(),'name','cities_city_id');
?>



<div class="advert-search">
<?php Pjax::begin(['id' => 'new_country']);?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
      //  ['options' => ['data-pjax' => true ]],

    ]); ?>

    <?= $form->field($model, 'city')->widget(TypeaheadBasic::className(),['data'=>$nameCity,
    'pluginOptions' => ['highlight' => true],
    'options' => ['placeholder' => 'Выберите город...'],
    ])?>

    <?php //$form->field($model, 'owner_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?= $form->field($model, 'currency')->dropDownList(['USD' => 'USD', 'EUR' => 'EUR', 'RUB' => 'RUB', ], ['prompt' => 'Выберите валюту']) ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?= $form->field($model, 'wish')->dropDownList([ 'Куплю' => 'Куплю', 'Продам' => 'Продам', ], ['prompt' => 'Куплю/Продам']) ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'short_telefon') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сброс', ['/main/index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
      <?php Pjax::end();?>

</div>
