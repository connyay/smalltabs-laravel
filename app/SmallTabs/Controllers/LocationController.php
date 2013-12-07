<?php namespace SmallTabs\Controllers;

use View, Cookie, Input, Redirect, Validator;
class LocationController extends BaseController {

	public function locate() {
		
		return View::make( 'location.locate' );
	}

	public function set($city) {
		$location = Cookie::forever('location', $city);
		return Redirect::to('/')->withCookie($location);
	}

	
}
