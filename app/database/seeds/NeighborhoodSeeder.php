<?php

class NeighborhoodSeeder extends Seeder {

	/**
	 * Seed the Neighborhood table.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('neighborhoods')->truncate();

		$neighborhoods = array(
			array('name' => 'Albany Park'), 
			array('name' => 'Andersonville'), 
			array('name' => 'Avondale'), 
			array('name' => 'Bridgeport'), 
			array('name' => 'Bucktown'), 
			array('name' => 'Edgewater'), 
			array('name' => 'Edison Park'), 
			array('name' => 'Gold Coast'), 
			array('name' => 'Humboldt Park'), 
			array('name' => 'Irving Park'), 
			array('name' => 'Jefferson Park'), 
			array('name' => 'Lakeview'), 
			array('name' => 'Lincoln Park'), 
			array('name' => 'Lincoln Square'), 
			array('name' => 'Logan Square'), 
			array('name' => 'Loop'), 
			array('name' => 'Millenium Park'), 
			array('name' => 'Near North Side'), 
			array('name' => 'Near South Side'), 
			array('name' => 'Near West Side'), 
			array('name' => 'Noble Square'), 
			array('name' => 'North Center'), 
			array('name' => 'Old Town'), 
			array('name' => 'Pilsen'), 
			array('name' => 'Printers Row'), 
			array('name' => 'River North'), 
			array('name' => 'Rogers Park'), 
			array('name' => 'Roscoe Village'), 
			array('name' => 'South Loop'), 
			array('name' => 'Streeterville'), 
			array('name' => 'Ukrainian Village'), 
			array('name' => 'University Village'), 
			array('name' => 'Uptown'), 
			array('name' => 'West Loop'), 
			array('name' => 'West Rogers Park'), 
			array('name' => 'Wicker Park'), 
			array('name' => 'Wrigleyville'),
		);
		DB::table('neighborhoods')->insert($neighborhoods);
	}

	
}