<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\ArrayHelper;
use app\models\TagLib;


//debug($model);
?>

<div class = "container">

  <div class = "col-sm-2">
          <?=Html::img("@web/$model->image", ['alt' => $model->title,'height'=>250,'padding-top'=>30])?>
 </div>
  <div class = "col-sm-6">
    <h5><?=$model->title?></h5>
      <p class ="cutstring" data-display = "none" data-max-length = "150" data-show-text = "Подробнее"
                   data-hide-text "" id="<?=$model->id;?>"> <?=$model->description;?> </p>
      <ul class="list-inline">
    <?php foreach($model->tags as $itemTag):?>
            <li>  <span class="label label-info"><?=$itemTag->tag_name?></span> </li>
                <?php endforeach;?>
                <li>
                  <span class="pluss glyphicon glyphicon-thumbs-up" id="<?=$model->id?>"></span><?=' '; echo $model->rating_plus;?>
                </li>
                <li>
                  <span class="minuss glyphicon glyphicon-thumbs-down" id="<?=$model->id?>"></span><?=' '; echo $model->rating_minus;?>
                </li>
     </ul>
     <hr>
  </div>

</div>


<?php
$script = <<< JS
//here you will write your js
(function( $ ) {
  $.fn.cutstring = function() {
		this.each(function() {
			var me = $(this);
			var settings = {
				display: me.is('[data-display]') ? me.attr('data-display') : 'none',
				maxLength: me.is('[data-max-length]') ? parseInt(me.attr('data-max-length')) : Math.ceil((me.html().length * 20) / 100),
				showText: me.is('[data-show-text]') ? me.attr('data-show-text') : 'show &raquo;',

				hideText: me.is('[data-hide-text]') ? me.attr('data-hide-text') : '&laquo; hide',
			};
			if ( me.html().length > settings.maxLength ) {
				var subText1 = me.html().substring(0, settings.maxLength);
				var subText2 = me.html().substring(settings.maxLength);
				var meHellip = $('<span>'+ ( (settings.display == '') ? ' ' : '&hellip; ' ) +'</span>').addClass('cutstring-hellip');
				var meSuffix = $('<span>'+ subText2 +'</span>').addClass('cutstring-suffix').css('display', settings.display);
				var meToggle = $('<span>'+ ( (settings.display == '') ? settings.hideText : settings.showText ) +'</span>').addClass('cutstring-toggle');
				me.html(subText1).append(meSuffix).append(meHellip).append(meToggle);
				meToggle.click(function() {
					settings.display = (settings.display == '') ? 'none' : '';
					meHellip.html( (settings.display == '') ? ' ' : '&hellip; ' );
					meSuffix.css('display', settings.display);
					meToggle.html( (settings.display == '') ? settings.hideText : settings.showText );
          a = me.attr('id');
         $.post("/bank/advert/add-count?id="+ a);
      //alert($(this).attr('content'));
    //  alert(me.attr('id'));
				});
			}
		})
  };
})(jQuery);

$(function() {
	$('.cutstring').cutstring();
});
JS;
$this->registerJs($script);
?>
