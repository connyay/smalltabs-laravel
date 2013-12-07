<?php namespace SmallTabs\Facades;

use Illuminate\Support\Facades\Facade;

class SmallTabsFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'SmallTabs'; }

}