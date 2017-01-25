<?php
namespace app\components;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class ShortNum extends Behavior
{
	public $in_attribute = 'telefon';
	public $out_attribute = 'short_telefon';


	public function events()
	{
		return [
			ActiveRecord::EVENT_BEFORE_VALIDATE => 'getShortNumber'
		];
	}
  public function getShortNumber( $event )
	{

			$this->owner->{$this->out_attribute} = substr( $this->owner->{$this->in_attribute},0, 7);
	return  $this->owner->{$this->out_attribute};
	}
}
