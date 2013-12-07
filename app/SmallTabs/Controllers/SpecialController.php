<?php namespace SmallTabs\Controllers;

use View, Carbon\Carbon, Input, Redirect, SmallTabs, Cache, Str;
use SmallTabs\Repositories\SpecialRepositoryInterface;
use SmallTabs\Models\Bar;
use SmallTabs\Models\Special;

class SpecialController extends BaseController {

	/**
	 * The special repository implementation.
	 *
	 * @var specials
	 */
	protected $specials;

	/**
	 * Create a new Special controller.
	 *
	 * @param SpecialRepositoryInterface $specials
	 *
	 * @return SpecialController
	 */
	public function __construct( SpecialRepositoryInterface $specials ) {
		$this->specials = $specials;
		$this->beforeFilter( 'auth', array( 'except' => array( 'index', 'day', 'neighborhood' ) ) );
	}

	public function index() {
		$specials = $this->specials->all();
		return $this->view( 'specials.index', compact( 'specials' ) );
	}

	public function day( $day = null ) {
		if ( is_null( $day ) ) {
			$current = Carbon::now()->dayOfWeek;
			$day = SmallTabs::getDay( $current );
		} else {
			$current = SmallTabs::getDay( $day );
		}
		$specials = $this->specials->day( $current );
		return View::make( 'specials.day', compact( 'specials', 'current', 'day' ) );
	}

	public function neighborhood( $day, $neighborhood ) {
		$neighborhood = Str::title($neighborhood);
		$current = SmallTabs::getDay( $day );
		$specials = $this->specials->day( $current, $neighborhood );
		return View::make( 'specials.day', compact( 'specials', 'current', 'day', 'neighborhood' ) );
	}

	/**
	 * Edit a special.
	 *
	 * @return Response
	 */
	public function edit( $id ) {
		$special = $this->specials->find( $id );
		return $this->view( 'specials.edit', compact( 'special' ) );
	}

	public function create( ) {
		return $this->view( 'specials.create' );
	}

	public function destroy( $id ) {
		$this->specials->delete( $id );
		return $this->redirectBack();
	}

	public function update( $id ) {
		$special = $this->specials->find( $id );
		$newValues = Input::only( 'description', 'type', 'day' );
		$newValues['bar_id'] = Input::get('bar');
		if ( $special->update( $newValues ) ) {
			$this->bustCache($special['day']);
			return Redirect::to( 'bar/'.$special["bar_id"] )->with( 'success', 'Special Saved!' );
		} else {
			return $this->redirectBack( 'error', 'Oops! There was a problem saving the special.' );
		}
	}

	public function store() {
		$special = Input::only( 'description', 'type', 'day' );
		$special['bar_id'] = Input::get('bar');
		if ( Special::create( $special ) ) {
			$this->bustCache($special['day']);
			return Redirect::to( 'bar/'.$special["bar_id"] )->with( 'success', 'Special Saved!' );
		} else {
			return $this->redirectBack( 'error', 'Oops! There was a problem updating the special.' );
		}
	}

	private function bustCache($day) {
		// BUST SPECIAL CACHES!
		Cache::forget( $day .'-query' );
	}

}
