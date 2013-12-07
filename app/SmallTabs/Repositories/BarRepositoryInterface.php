<?php namespace SmallTabs\Repositories;

interface BarRepositoryInterface {

	/**
	 * Get all of the bars.
	 *
	 * @return array
	 */
	public function all();

	/**
	 * Get one bar.
	 *
	 * @return array
	 */
	public function find( $id );

	/**
	 * Get one bar.
	 *
	 * @return array
	 */
	public function slug( $slug );

	public function delete( $id );

	/**
	 * Create a new Bar.
	 *
	 * @param array   $bar
	 * @return Bar
	 */
	public function create( $name, $address, $phonenumber, $website, $facebook, $twitter, $yelp, $neighborhood_id );

	/**
	 * Updates a Bar.
	 *
	 * @param integer $id
	 * @param array   $barData
	 * @return Bar
	 */
	public function update( $id, $name, $slug, $address, $phonenumber, $website, $facebook, $twitter, $yelp, $neighborhood_id );
}
