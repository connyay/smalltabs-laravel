<?php

$smallTabsControllers = 'SmallTabs\Controllers\\';

// Location pick and set
Route::get( '/location', array( 'as'=>'location', 'uses' => $smallTabsControllers.'LocationController@locate' ) );
Route::get( '/location/{city}', array( 'as'=>'set.location', 'uses' => $smallTabsControllers.'LocationController@set' ) );

// Login / logout
Route::get( '/login', array( 'as'=>'login', 'before' => 'guest', 'uses' => $smallTabsControllers.'UserController@login' ) );
Route::post( '/login', array( 'uses' => $smallTabsControllers.'UserController@doLogin' ) );
Route::get( '/logout', array( 'as'=>'logout', 'uses' => $smallTabsControllers.'UserController@logout' ) );

Route::group( array( 'before' => 'locate' ), function() use ( $smallTabsControllers ) {
		$subdomain = Helper::getSubdomain();

		if ( empty( $subdomain ) ) {
			// We don't have a subdomain set, so return and will hit the filter.
			Route::any( '{all}', function() {
					return;
				} )->where( 'all', '.*' );
		}

		Route::group( array( 'domain' => $subdomain.Config::get('app.baseroute') ), function() use ( $smallTabsControllers ) {

				Route::get( '/', array( 'uses' => $smallTabsControllers.'SpecialController@day' ) );

				// Bar Routes
				Route::resource( 'bar', $smallTabsControllers.'BarController', array( 'except' => array( 'show' ) ) );
				Route::get( '/bar/{bar_id}', array( 'uses' => $smallTabsControllers.'BarController@show' ) )->where( 'bar_id', '[0-9]+' );
				Route::get( '/bar/{slug}', array( 'as'=>'bar.show', 'uses' => $smallTabsControllers.'BarController@showSlug' ) );

				// Neighborhood Routes
				Route::resource( 'neighborhood', $smallTabsControllers.'NeighborhoodController', array( 'except' => array( 'show' ) ) );
				Route::get( '/neighborhood/{name}', array( 'as'=>'neighborhood.show', 'uses' => $smallTabsControllers.'NeighborhoodController@listBars' ) );

				// Special Routes
				Route::resource( 'special', $smallTabsControllers.'SpecialController', array( 'except' => array( 'show' ) ) );
				Route::get( '/day/{day?}', array( 'uses' => $smallTabsControllers.'SpecialController@day' ) );
				Route::get( '/day/{day}/neighborhood/{neighborhood}', array( 'uses' => $smallTabsControllers.'SpecialController@neighborhood' ) );

				Route::group( array( 'prefix' => 'admin', 'before' => 'auth' ), function() use ( $smallTabsControllers ) {
						// Show Dashboard
						Route::get( '/', array( 'as'=>'admin.dashboard', 'uses' => $smallTabsControllers.'AdminController@dashboard' ) );
						// Admin Bar Routes
						Route::get( '/bars', array( 'as'=>'admin.bars', 'uses' => $smallTabsControllers.'AdminController@bars' ) );
						Route::get( '/bar/{id}/edit', array( 'as'=>'admin.bar.edit', 'uses' => $smallTabsControllers.'AdminController@barEdit' ) );
						Route::get( '/bar/create', array( 'as'=>'admin.newbar', 'uses' => $smallTabsControllers.'AdminController@createBar' ) );
						// Admin Neighborhood Routes
						Route::get( '/neighborhoods', array( 'as'=>'admin.neighborhoods', 'uses' => $smallTabsControllers.'AdminController@neighborhoods' ) );
						Route::get( '/neighborhood/{id}/edit', array( 'as'=>'admin.neighborhood.edit', 'uses' => $smallTabsControllers.'AdminController@neighborhoodEdit' ) );
						Route::get( '/neighborhood/create', array( 'as'=>'admin.newneighborhood', 'uses' => $smallTabsControllers.'AdminController@createNeighborhood' ) );
						// Admin Special Routes
						Route::get( '/specials', array( 'as'=>'admin.specials', 'uses' => $smallTabsControllers.'AdminController@specials' ) );
						Route::get( '/special/create', array( 'as'=>'admin.newspecial', 'uses' => $smallTabsControllers.'AdminController@createSpecial' ) );
					} );

			} );
	} );
