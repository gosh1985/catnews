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
  <code><?= __FILE__ ?></code>

<?=FirstWidget::widget(['a'=>37,'b'=>63]);?>

<?php

echo ListView::widget([
    'dataProvider' => $listDataProvider,
    'itemView' => '_list',
]);?>
