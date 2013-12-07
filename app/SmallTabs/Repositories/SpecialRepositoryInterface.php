<?php namespace SmallTabs\Repositories;

interface SpecialRepositoryInterface {

	/**
	 * Get all of the specials.
	 *
	 * @return array
	 */
	public function all();

	/**
	 * Get all of today specials.
	 *
	 * @return array
	 */
	public function today();

	public function find($id);

	public function delete( $id );

	/**
	 * Get all of the provided day's specials.
	 *
	 * @return array
	 */
	public function day( $day, $neighboorhood = null );
}
