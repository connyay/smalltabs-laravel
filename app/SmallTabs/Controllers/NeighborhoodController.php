<?php namespace SmallTabs\Controllers;

use View, Input, Redirect, Cache, App;
use SmallTabs\Models\Neighborhood;

class NeighborhoodController extends BaseController {

	/**
	 * The bar repository implementation.
	 *
	 * @var bars
	 */
	protected $neighborhoods;

	/**
	 * Create a new Neighborhood controller.
	 *
	 * @param Neighborhood $neighborhoods
	 *
	 * @return NeighborhoodController
	 */
	public function __construct( Neighborhood $neighborhoods ) {
		$this->neighborhoods = $neighborhoods;
		$this->beforeFilter( 'auth', array( 'except' => array( 'listBars' ) ) );
	}

	/**
	 * Display form to create new neighborhoods.
	 *
	 * @return Response
	 */
	public function create() {
		return $this->view( 'neighborhoods.create' );
	}

	/**
	 * Display form to create new neighborhoods.
	 *
	 * @return Response
	 */
	public function edit( $name ) {
		$neighborhood = $this->neighborhoods->where( 'name', $name )->first();
		return $this->view( 'neighborhoods.edit', compact( 'neighborhood' ) );
	}

	/**
	 * Display bars located in the neighborhood.
	 *
	 * @return Response
	 */
	public function listBars( $name ) {
		$neighborhood = $this->neighborhoods->where( 'name', $name )->first();
		if(is_null($neighborhood)){
			App::abort(404, 'Neighborhood not found');
		}
		$bars = $neighborhood->bars()->get();
		return $this->view( 'neighborhoods.bars', compact( 'neighborhood', 'bars' ) );
	}

	public function store() {
		$name = Input::get( 'name' );
		$note = Input::get( 'note' );
		if ( $this->neighborhoods->create( compact( 'name', 'note' ) ) ) {
			$this->bustCache();
			return Redirect::to( '' )->with( 'success', 'Neighborhood Saved!' );
		} else {
			return Redirect::to( 'bar/create' )->with( 'error', 'Oops! There was a problem saving the neighborhood.' )->withInput();
		}
	}

	public function update( $id ) {

		$name = Input::get( 'name' );
		$note = Input::get( 'note' );
		$neighborhood = $this->neighborhoods->findOrFail( $id );
		if ( $neighborhood->fill( compact( 'name', 'note' ) )->save() ) {
			$this->bustCache();
			return Redirect::to( '' )->with( 'success', 'Neighborhood Saved!' );
		} else {
			return Redirect::to( 'bar/create' )->with( 'error', 'Oops! There was a problem saving the neighborhood.' )->withInput();
		}
	}

	public function destroy( $id ) {
		$this->neighborhoods->find( $id )->delete();
		$this->bustCache();
		return Redirect::to( '' )->with( 'success', 'Neighborhoods Deleted!' );
	}

	private function bustCache() {
		// BUST NH CACHES!
		Cache::forget( 'nh-dd' );
	}
}
