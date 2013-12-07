<?php namespace SmallTabs\Repositories;

use Str, App;
use SmallTabs\Models\Bar;

class DbBarRepository implements BarRepositoryInterface {

	/**
	 * Get all of the bars.
	 *
	 * @return array
	 */
	public function all() {
		return Bar::get();
	}

	public function delete( $id ) {
		return Bar::find( $id )->delete();
	}

	/**
	 * Get one bar.
	 *
	 * @return array
	 */
	public function find( $id ) {
		$bar = Bar::with( 'specials', 'neighborhood' )->find( $id );
		if ( is_null( $bar ) ) {
			App::abort( 404, 'Bar not found' );
		}
		return $bar;
	}

	/**
	 * Get one bar by slug.
	 *
	 * @return array
	 */
	public function slug( $slug ) {
		$bar = Bar::with( 'specials', 'neighborhood' )->where( 'slug', $slug )->first();
		if ( is_null( $bar ) ) {
			App::abort( 404, 'Bar not found' );
		}
		return $bar;
	}

	/**
	 * Create a new Bar.
	 *
	 * @param array   $bar
	 * @return Bar
	 */
	public function create( $name, $address, $phonenumber, $website, $facebook, $twitter, $yelp, $neighborhood_id ) {
		$slug = Str::slug( $name );
		return Bar::create( compact( 'name', 'slug', 'address',  'phonenumber',  'website',  'facebook',  'twitter',  'yelp',  'neighborhood_id' ) );
	}

	/**
	 * Updates a Bar.
	 *
	 * @param integer $id
	 * @return Bar
	 */
	public function update( $id, $name, $slug, $address, $phonenumber, $website, $facebook, $twitter, $yelp, $neighborhood_id ) {
		$bar = $this->find( $id );
		if ( empty( $slug ) ) {
			$slug = Str::slug( $name );
		}
		$bar->fill(
			compact( 'name', 'slug', 'address',  'phonenumber',  'website',  'facebook',  'twitter',  'yelp',  'neighborhood_id' ) )->save();
		return $bar;
	}
}
