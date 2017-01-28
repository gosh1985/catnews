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
  <div class="col-sm-3" style="background-color:white;">
<?= $this->render('_search',['model'=>$searchModel]);?>
             </div>
             <div class="col-sm-9" style="background-color:white;">
            <?php
            echo ListView::widget([
              // 'dataProvider' => $listDataProvider,
              'dataProvider'=>$dataProvider,
               'itemView' => '_list',
            ]);
            ?>
            </div>
</div>
</div>
</div>
