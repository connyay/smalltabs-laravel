<?php namespace SmallTabs\Models\Partials;

use SmallTabs\Models\Partials\fSpecial;

class fBarSpecials {

	public $days;

	public function __construct( ) {
		$this->days = array(
			array( 'day'=>'Sunday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Monday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Tuesday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Wednesday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Thursday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Friday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' ),
			array( 'day'=>'Saturday', 'Food'=>'', 'Drink'=>'', 'Event'=>'' )
		);
	}

	public function push( $special ) {
		$this->days[$special->day][$special->type]
			= new fSpecial( $special->id, $special->description, $special->bar, $special->day, $special->type );
	}
}
