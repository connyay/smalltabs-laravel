<?php namespace SmallTabs\Facades;

use Str, Request, App;
use SmallTabs\Models\Neighborhood;
use SmallTabs\Models\Bar;
use SmallTabs\Models\Partials\fBarSpecials;
use SmallTabs\Models\Partials\fDaySpecials;

class SmallTabs {
	// Note: Debated moving these to database, but didn't quite seem worth it.
	private $types = array( 0=>"Drink", 1=>"Food", 2=>"Event" );
	private $days = array( 0=>"Sunday", 1=>"Monday", 2=>"Tuesday",
		3=>"Wednesday", 4=>"Thursday", 5=>"Friday", 6=>"Saturday" );

	/**
	 * Returns the Day constants.
	 * Abstracted incase they are moved to DB.
	 * 
	 * @return array $days
	 */
	public function getDays() {
		return $this->days;
	}

	/**
	 * Returns the Type constants.
	 * Abstracted incase they are moved to DB.
	 * 
	 * @return array $types
	 */
	public function getTypes() {
		return $this->types;
	}

	/**
	 * Returns the String equivalent of the type constants.
	 * Abstracted incase they are moved to DB.
	 * 
	 * @return array $types
	 */
	public function getType($type) {
		return $this->types[$type];
	}

	/**
	 * If string is provided the int equivalent will be returned.
	 * If int is provided the string equivalent will be returned.
	 *  
	 * @return mixed $day
	 */
	public function getDay( $day ) {
		$days = $this->getDays();
		if ( is_int( $day ) ) {
			return $this->getDayFromInt( $day, $days );
		} else {
			return $this->getDayFromString( $day, $days );
		}
	}

	/**
	 * Returns the neighborhood formated for a select element.
	 * 
	 * @return array $neighborhoods
	 */
	public function neighborhoodDropDown() {
		return Neighborhood::all()->lists( 'name', 'id' );
	}

	/**
	 * Returns the bars formated for a select element.
	 * 
	 * @return array $bars
	 */
	public function barDropDown() {
		return Bar::all()->lists( 'name', 'id' );
	}

	/**
	 * Gets the recently created bars.
	 * Results cached for 24 hours.
	 *
	 * @return array $bars
	 */
	public function getRecentlyAdded() {
		// Cache added for a day.
		return Bar::remember( 60*24, 'recent-bar-add' )->with( 'neighborhood' )->orderBy( 'created_at', 'DESC' )->take( 10 )->get();
	}

	/**
	 * Gets the recently updated bars.
	 * Results cached for 12 hours.
	 *
	 * @return array $bars
	 */
	public function getRecentlyUpdated() {
		// Cache updated for half a day.
		return Bar::remember( 60*12, 'recent-bar-updated' )->with( 'neighborhood' )->orderBy( 'updated_at', 'DESC' )->take( 10 )->get();
	}

	/**
	 *  Aborts the current request
	 *  @param int $error
	 */
	public function abort( $error = 404, $message = "" ) {
		App::abort( $error, $message );
	}

	/**
	 * 
	 */
	public function formatBarSpecials($specials) {
		$fSpecials = new fBarSpecials();
		foreach ( $specials as $special ) {
			$special->type = $this->getType($special->type);
			$fSpecials->push($special);
		}
		return $fSpecials->days;
	}

	public function formatDaySpecials($specials) {
		$fSpecials = new fDaySpecials();
		foreach ( $specials as $special ) {
			$special->type = $this->getType($special->type);
			$fSpecials->push($special);
		}
		shuffle($fSpecials->specials);
		return $fSpecials;
	}

	private function getDayFromString( $day, $days ) {
		$day = Str::title( $day );
		$key = array_search( $day, $days );
		if ( is_int($key) ) {
			return $key;
		}
		$this->abort(404, "What day was that...");
	}
	private function getDayFromInt( $day, $days ) {
		if ( array_key_exists( $day, $days ) ) {
			return $days[$day];
		}
		$this->abort(404, "What day was that...");
	}

}
