<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="news-item">
    <h2><?= Html::encode($model->id) ?></h2>
    <?= HtmlPurifier::process($model->name) ?>
</div>
