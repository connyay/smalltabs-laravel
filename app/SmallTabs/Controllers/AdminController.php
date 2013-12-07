<?php namespace SmallTabs\Controllers;

use View, Auth, Input, Redirect, Validator;
use SmallTabs\Models\Bar;
use SmallTabs\Models\Neighborhood;
class AdminController extends BaseController {

	protected $layout = 'admin.layouts.master';

	public function dashboard() {
		return $this->view( 'admin.dashboard' );
	}

	public function bars() {
		$bars = Bar::with('neighborhood', 'specials')->orderBy('bars.neighborhood_id')->paginate(15);
		return $this->view( 'admin.bars', compact('bars') );
	}

	public function createBar() {
		return $this->view( 'bars.create' );
	}

	public function barEdit($id) {
		$bar = Bar::findOrFail($id);
		return $this->view( 'bars.edit', compact('bar') );
	}

	public function neighborhoods() {
		$neighborhoods = Neighborhood::with('bars')->orderBy('neighborhoods.name')->paginate(15);
		return $this->view( 'admin.neighborhoods', compact('neighborhoods') );
	}

	public function createNeighborhood() {
		return $this->view( 'neighborhoods.create' );
	}

	public function specials() {
		return $this->view( 'admin.specials' );
	}

	public function createSpecial() {
		return $this->view( 'specials.create' );
	}
}
