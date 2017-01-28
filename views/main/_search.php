<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use yii\widgets\Pjax;
use app\models\TagLib;
use app\models\Category;
use app\models\News;
/* @var $this yii\web\View */
/* @var $model app\models\AdvertSearch */
/* @var $form yii\widgets\ActiveForm */


$tagName = ArrayHelper::getColumn(Taglib::find()->all(),'tag_name' );
?>
<div class="news-search">
<?php Pjax::begin(['id' => 'new_country']);?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
      //  ['options' => ['data-pjax' => true ]],

    ]); ?>

    <?= $form->field($model, 'tag_name')->widget(TypeaheadBasic::className(),['data'=>$tagName,
    'pluginOptions' => ['highlight' => true],
    'options' => ['placeholder' => 'Выберите тег...'],
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сброс', ['/main/index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
      <?php Pjax::end();?>

</div>
