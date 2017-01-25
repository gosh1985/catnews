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

?>
  <code><?= __FILE__ ?></code>

<?=FirstWidget::widget(['a'=>37,'b'=>63]);?>
