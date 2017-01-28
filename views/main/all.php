
<?php foreach ($categories as $category):?>
  	<h4><a href = "<?= \yii\helpers\Url::to(['category/show','id'=>$category->id])?>"><strong><?= $category->name?></strong></a></h4>
<?php $i =0; foreach($category->news as $item):?>
  <h5><a href = "<?= \yii\helpers\Url::to(['news/show','id'=>$item->id])?>"style ="padding-left:30px"><?=$item->title; $i++;?></a></h5>
  <?php if ($i == 2)

  break;

endforeach;?>
  <?php endforeach;?>
