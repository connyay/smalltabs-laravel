<?php

$smallTabsApiControllers = 'SmallTabs\Controllers\Api\\';

// Can't decide which way I prefer... api/____ or ____.json
// I think api/___ should be reserved for creation / updating.

Route::get( '/api/bar/{id}', array( 'uses' => $smallTabsApiControllers.'ApiBarController@show' ) )->where( 'id', '[0-9]+' );
Route::get( '/api/bar/{slug}', array( 'as'=>'api.bar.show', 'uses' => $smallTabsApiControllers.'ApiBarController@showSlug' ) );

Route::get( '/bar/{id}.json', array( 'uses' => $smallTabsApiControllers.'ApiBarController@show' ) )->where( 'id', '[0-9]+' );
Route::get( '/bar/{slug}.json', array( 'as'=>'bar.show.json', 'uses' => $smallTabsApiControllers.'ApiBarController@showSlug' ) );


Route::get( '/api/day/{day?}', array( 'uses' => $smallTabsApiControllers.'ApiSpecialController@day' ) );
Route::get( '/day/today.json', array( 'uses' => $smallTabsApiControllers.'ApiSpecialController@day' ) );
Route::get( '/day/{day}.json', array( 'uses' => $smallTabsApiControllers.'ApiSpecialController@day' ) );

Route::get( '/api/day/{day}/neighborhood/{neighborhood}', array( 'uses' => $smallTabsApiControllers.'ApiSpecialController@neighborhood' ) );
Route::get( '/day/{day}/neighborhood/{neighborhood}.json', array( 'uses' => $smallTabsApiControllers.'ApiSpecialController@neighborhood' ) );