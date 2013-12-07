<?php $bars = SmallTabs\Models\Bar::remember( 60*24 , 'bar-dd' )->orderBy( 'name' )->get( ['name', 'slug'] )->lists( 'name', 'slug' );
$bars = array_merge( array( "#"=>"Browse By Bar Name" ), $bars ); ?>

<div class="large-12 columns">
	{{ Form::select('bars', $bars, null, array('id'=>'bar_dd', 'class' => 'form-control')) }}
</div>
