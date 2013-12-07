<?php
// Caching these results for a day.
$neighborhoods = SmallTabs\Models\Neighborhood::remember( 60 * 24, 'nh-dd' )->orderBy( 'name' )->get( ['name'] )->lists( 'name', 'name' );
$neighborhoods = array_merge( array( "#"=>"Sort By Neighborhood" ), $neighborhoods );?>

{{ Form::select('neighborhoods', $neighborhoods, null, array('id'=>'nh_sort_dd', 'class' => 'form-control')) }}
