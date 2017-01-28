<?php
use yii\helpers\Html;
 ?>

<div class = "container">

  <div class = "col-sm-2">
          <?=Html::img("@web/$newsDetail->image", ['alt' => $newsDetail->title,'height'=>250])?>
 </div>
  <div class = "col-sm-6">
      <p><?=$newsDetail->description?></p>
  </div>
</div>
