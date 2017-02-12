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
      <p class ="cutstring" data-display = "none" data-max-length = "150" data-show-text = "Подробнее"
                   data-hide-text "" id="<?=$model->id;?>"> <?=$model->description;?> </p>
      <ul class="list-inline">
    <?php foreach($model->tags as $itemTag):?>
            <li>  <span class="label label-info"><?=
            $itemTag->tag_name
            ?></span> </li>
                <?php endforeach;?>
                <li>
                <div class = "pluss" id="<?=$model->id?>"><span class=" glyphicon glyphicon-thumbs-up" ></span><?=' ';?><a><?= $model->rating_plus;?></a></div>
                </li>

                <li>
                <div class = "minuss" id="<?=$model->id?>"><span class=" glyphicon glyphicon-thumbs-down" ></span><?=' ';?><a><?= $model->rating_minus;?></a></div>
                </li>
     </ul>
     <hr>
  </div>

</div>
