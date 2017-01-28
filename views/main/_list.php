<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\ArrayHelper;
use app\models\TagLib;


//debug($model);
?>

<div class = "container">

  <div class = "col-sm-2">
          <?=Html::img("@web/$model->image", ['alt' => $model->title,'height'=>250,'padding-top'=>30])?>
 </div>
  <div class = "col-sm-6">
    <h5><?=$model->title?></h5>
      <p><?=$model->description?></p>
      <ul class="list-inline">
    <?php foreach($model->tags as $itemTag):?>
  <li>  <span class="label label-info"><?=$itemTag->tag_name?></span> </li>
</hr>
      <?php endforeach;?>
    </ul>
    <hr>
  </div>
</div>
