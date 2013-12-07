<?php namespace SmallTabs\Repositories;

use \Carbon\Carbon, Str, Helper, Cache;
use SmallTabs\Models\Special;
use SmallTabs\Models\Neighborhood;

class DbSpecialRepository implements SpecialRepositoryInterface {

	/**
	 * Get all of the specials.
	 *
	 * @return array
	 */
	public function all() {
		return Special::orderBy( 'id', 'DESC' )->get();
	}

	public function find( $id ) {
		return Special::findOrFail( $id );
	}

	public function delete( $id ) {
		$special = $this->find( $id );
		Cache::forget($special->day . '-query');
		return $special->delete();
	}
	/**
	 * Get all of todays specials.
	 *
	 * @return array
	 */
	public function today() {
		$today = Carbon::now()->dayOfWeek;
		return Special::orderBy( 'id', 'DESC' )->where( 'day', $today )->get();
	}

	/**
	 * Get all of the provided day's specials.
	 *
	 * @return array
	 */
	public function day( $day, $neighborhood = null ) {
		$query = Special::with( 'bar', 'bar.neighborhood' )->where( 'day', $day );
		if ( !is_null( $neighborhood ) ) {
			$neighborhood = Neighborhood::where( 'name', $neighborhood )->first();
			$query->join( 'bars', 'bars.id', '=', 'specials.bar_id' )
			->where( 'bars.neighborhood_id', $neighborhood->id )
			->remember( 30, $day.'-'.$neighborhood.'-query' );
		} else {
			$query->remember( 60 * 6, $day.'-query' );
		}
		return $query->get();
	}

}
