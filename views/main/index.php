<?php
/* @var $this yii\web\View
 * @var $hello string */
// use Yii;
use app\components\FirstWidget;
use app\components\SecondWidget;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\controllers\MainController;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\grid\DataColumn;

use app\models\News;
use app\models\Category;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

?>

<div class="container-fluid">

  <div class="row">

<div class="conteiner">

                  <div class="col-sm-4" style="background-color:white;">
                <?= $this->render('_search',['model'=>$searchModel]);?>
                <?php foreach ($categories as $category):?>
  	<h4><a href = "<?= \yii\helpers\Url::to(['category/show','id'=>$category->id])?>"><strong><?= $category->name?></strong></a></h4>
<?php $i =0; foreach($category->news as $item):?>
  <h5><a href = "<?= \yii\helpers\Url::to(['news/show','id'=>$item->id])?>"style ="padding-left:30px"><?=$item->title; $i++;?></a></h5>
  <?php if ($i == 2)

  break;

endforeach;?>
  <?php endforeach;?>
  

                 </div>

             <div class="col-sm-8" style="background-color:white;">
            <?php
            echo ListView::widget([
              // 'dataProvider' => $listDataProvider,
              'dataProvider'=>$dataProvider,
               'itemView' => '_list',
                'summary' => false,
            ]);
            ?>
            </div>
</div>
</div>
</div>
