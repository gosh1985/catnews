<?php
use yii\helpers\Html;
 ?>

<div class = "container">

  <div class = "col-sm-2">
          <?=Html::img("@web/$newsDetail->image", ['alt' => $newsDetail->title,'height'=>250])?>
 </div>
  <div class = "col-sm-6">
      <p><?=$newsDetail->description?></p>
      <ul class="list-inline">
    <?php foreach($newsDetail->tags as $itemTag):?>
            <li>  <span class="label label-info"><?php echo $itemTag->tag_name;?></span> </li>
                <?php endforeach;?>
                
     </ul>
  </div>
</div>
