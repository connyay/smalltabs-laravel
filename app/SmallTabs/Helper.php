<?php namespace SmallTabs;

use Request;

class Helper {
	public static function getSubdomain() {
		$server = explode( '.', Request::server( 'HTTP_HOST' ) );
		return (count($server) === 3) ? $server[0] : '';
	}
}
