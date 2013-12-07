<?php namespace SmallTabs\Controllers;

use View, Input, Redirect, Str, Cache;
use SmallTabs\Repositories\BarRepositoryInterface;
use SmallTabs\Models\Neighborhood;
use SmallTabs\Models\Special;

class BarController extends BaseController {

	/**
	 * The bar repository implementation.
	 *
	 * @var bars
	 */
	protected $bars;

	/**
	 * Create a new Bar controller.
	 *
	 * @param BarRepositoryInterface $bars
	 *
	 * @return BarController
	 */
	public function __construct( BarRepositoryInterface $bars ) {
		$this->bars = $bars;
		
		$this->beforeFilter('auth', array('except' => array('index', 'show', 'showSlug')));
	}

	/**
	 * Display a listing of all the bars.
	 *
	 * @return Response
	 */
	public function index() {

		$bars = $this->bars->all();
		return $this->view( 'bars.index', compact( 'bars' ) );
	}

	/**
	 * Display one bar.
	 *
	 * @return Response
	 */
	public function show( $id ) {
		$bar = $this->bars->find( $id );
		return $this->view( 'bars.view', compact( 'bar' ) );
	}

	/**
	 * Display one bar.
	 *
	 * @return Response
	 */
	public function showSlug( $slug ) {
		$bar = $this->bars->slug( $slug );
		return $this->view( 'bars.view', compact( 'bar' ) );
	}

	public function destroy( $id ) {
		$this->bars->delete( $id );
		$this->bustCache();
		return Redirect::to( '' )->with( 'success', 'Bar Deleted!' );
	}

	/**
	 * Edit a bar.
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$bar = $this->bars->find( $id );
		return $this->view( 'bars.edit', compact( 'bar', 'dd' ) );
	}

	/**
	 * Display form to create new bar.
	 *
	 * @return Response
	 */
	public function create() {
		return $this->view( 'bars.create', compact( 'dd' ) );
	}

	/**
	 * Display form to create new bar.
	 *
	 * @return Response
	 */
	public function store() {
		$name = Input::get( 'name' );
		$slug = Str::slug($name);
		if ( $this->bars->create( 
				$name,
				Str::title( Input::get( 'address' ) ),
				Input::get( 'phonenumber' ),
				Input::get( 'website' ),
				Input::get( 'facebook' ),
				Input::get( 'twitter' ),
				Input::get( 'yelp' ),
				Input::get( 'neighborhood_id' ) ) ) {
			$this->bustCache();
			return $this->redirectRoute( 'bar.show', $slug )->with( 'success', 'Bar Saved!' );
		} else {
			return $this->redirectBack( 'error', 'Oops! There was a problem saving the bar.' );
		}
	}

	/**
	 * Store changes to a bar.
	 *
	 * @return Response
	 */
	public function update( $id ) {
		$slug = Input::get( 'slug' );
		if ( $this->bars->update( $id, Input::get( 'name' ),
				$slug,
				Str::title( Input::get( 'address' ) ),
				Input::get( 'phonenumber' ),
				Input::get( 'website' ),
				Input::get( 'facebook' ),
				Input::get( 'twitter' ),
				Input::get( 'yelp' ),
				Input::get( 'neighborhood_id' )  ) ) {
			$this->bustCache();
			return $this->redirectRoute( 'bar.show', $slug )->with( 'success', 'Bar Updated!' );
		} else {
			return $this->redirectBack( 'error', 'Oops! There was a problem updating the bar.' );
		}
	}

	private function bustCache() {
		// BUST BAR CACHES!
		Cache::forget( 'bar-dd' );
		Cache::forget( 'bar-count' );
		Cache::forget( 'recent-bar-add' );
		Cache::forget( 'recent-bar-updated' );
	}
}
