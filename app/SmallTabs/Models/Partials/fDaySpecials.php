<?php namespace SmallTabs\Models\Partials;

use SmallTabs\Models\Partials\fSpecial;

class fDaySpecials {

	public $specials;
	private $empty = true;

	public function __construct( ) {
		$this->specials = array();
	}

	public function push( $special ) {
		$this->empty = false;
		$this->specials[$special->bar->id]['bar'] = $special->bar;
		$this->specials[$special->bar->id]['bar'][$special->type]
			= new fSpecial( $special->id, $special->description, $special->bar, $special->day, $special->type );
	}

	public function isEmpty() {
		return $this->empty;
	}
}
