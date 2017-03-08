<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use mihaildev\ckeditor\CKEditor;
?>
<div class="row" data-key="<?=$category[$widget->idField]?>">
    <div class="col-lg-12 col-xs-12">
      <!--  ∟ -->
        <input type="hidden" name="ids[]" value="<?=$category[$widget->idField];?>" />
        <?php if($category['text']) {  ?>
        <?php
        echo
'<div class="comment-with-border ">'.
$category['text'];?>
<?php if($category['parent_id'] == 0){ ?>
<?= Html::button('<span class="glyphicon glyphicon-comment"> <b>Обсудить</b></span>',
['value'=>Url::to(['sub-comment-create','id' => $category['id']]),'class' => 'btn btn-success btn-xs position_right modalButtonDiscussion']);?>
<?php }?>

<?php echo '</div>';?>
<?php }?>
</div>

</div>
