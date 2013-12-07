<?php // Caching these results for a day.
$neighborhoods = SmallTabs\Models\Neighborhood::remember( 60 * 24, 'nh-dd' )->orderBy( 'name' )->get( ['name'] )->lists( 'name', 'name' );
$neighborhoods = array_merge( array( "#"=>"Browse By Neighborhood" ), $neighborhoods ); ?>

<div class="large-12 columns">
	{{ Form::select('neighborhoods', $neighborhoods, null, array('id'=>'nh_dd', 'class' => 'form-control')) }}
</div>
