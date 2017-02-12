<?php


use yii\helpers\Html;
use mihaildev\ckeditor\CKEditor;
use yii\widgets\ActiveForm;
use app\models\News;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\models\Comment;
use yii\widgets\Menu;
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
    <b> <hr></b>
     <p>
       <?= Html::button('Оставить комментарий', ['value'=>Url::to('comment-create'),'class' => 'btn btn-success','id'=>'modalButtonComment']) ?>
     </p>

     <?php

       Modal::begin([
       'header' => '<h2>Оставь комментарий</h2>',
       'id'=>'modalCommentCreate',
       'size'=>'modal-md',
       ]);

       echo ' <div id="modalComment"></div>';
       $session = Yii::$app->session;
    $session->open();
    $session['newsId']=$newsDetail->id;
       Modal::end();

  ?>
<!-- here should be some comment-->
<?php foreach($newsComments as $com):?>
 <div class="panel panel-default col-sm-12">
   <div class="panel-body ">
    <?=$com->text;?>
    <?= Html::button('<span class="glyphicon glyphicon-comment"> <b>Обсудить</b></span>',
     ['value'=>Url::to('sub-comment-create'),'class' => 'btn btn-success btn-xs position_right modalButtonDiscussion']) ?>
   </div>
 </div>
 <?php endforeach;?>
<!-- here should be some comment-->
 <?php

   Modal::begin([
   'header' => '<h2>Оставь комментарий</h2>',
   'id'=>'modalDiscussionCreate',
   'size'=>'modal-md',
   ]);

   echo ' <div id="modalDiscussion"></div>';
   $session = Yii::$app->session;
$session->open();
$session['parentId']=$com->id;
$session['newsId']=$newsDetail->id;
   Modal::end();

?>

  </div>
</div>
