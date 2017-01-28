<?php
use yii\helpers\Html;
 ?>


<div class = "container">
   <div class = "col-sm-2">
   <h1><?=$allInCategory->name?></h1>
  </div>
   <div class = "col-sm-6">
     <?php foreach($allInCategory->news as $item):?>
       <p><?=$item->title?></p>
       <?=Html::img("@web/$item->image", ['alt' => $item->title,'height'=>150])?>

             <p><?=$item->description?></p>
                 <ul class="list-inline">
               <?php foreach($item->tags as $itemTag):?>
             <li>  <span class="label label-info"><?=$itemTag->tag_name?></span> </li>
           </hr>
                 <?php endforeach;?>
               </ul>
       <?php endforeach;?>
   </div>
</div>
