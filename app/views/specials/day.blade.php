@extends('layouts.master')
@if($fSpecials = SmallTabs::formatDaySpecials( $specials ))  @endif

@section('title')
{{{ Str::title($day) }}}'s Bar Specials
@if(isset($neighborhood)) in {{ $neighborhood }} @endif
@stop

@section('content')
<script>var day = "{{{ Str::title($day) }}}";</script>
<div class="row">
<div class="large-12 columns">
	@include('layouts.sidebar')
		<div class="large-5 medium-8 large-pull-4 columns">
		<h3>{{{ Str::title($day) }}}'s Bar Specials
			@if(isset($neighborhood)) in {{ $neighborhood }} @endif
		</h3>
	</div>
		<div class="large-3 medium-4 large-pull-4 columns">
		@include('layouts.neighborhood_sort_dd')
	</div>
	<div class="large-8 medium-12 large-pull-4 columns">
		@foreach($fSpecials->specials as $special)
		@if($bar = $special['bar']) @endif
		<div class="panel">

		<h3>{{ $bar->link() }}</h3>

		<p class="subheader">
		{{ $bar->location() }} 
		{{ $bar->number(' • ') }}
		</p>


		@if(isset($bar["Food"]))
		<hr>
		<p><strong>Food:</strong> {{$bar["Food"]->description}}</p>
		@endif

		@if(isset($bar["Drink"]))
		<hr>
		<p><strong>Drink:</strong> {{$bar["Drink"]->description}}</p>
		@endif

		@if(isset($bar["Event"]))
		<hr>
		<p><strong>Event:</strong> {{$bar["Event"]->description}}</p>
		@endif

		@if(isset($bar->neighborhood->note) && !empty($bar->neighborhood->note))
		<hr>
		<small class="subheader"><strong>Important!</strong> {{ $bar->neighborhood->cleanNote() }}</small>
		@endif
		</div>

		@endforeach

		@if($fSpecials->isEmpty())
		<h4>No Specials Found</h4>
		@endif
	</div>
</div>
</div>


@section('actions')
<ul class="right">
    <li class="divider"></li>
    <li><a href="{{ URL::to('bar/create')}}" class="button success">New Bar</a></li>
    <li class="divider"></li>
    <li><a href="{{ URL::to('neighborhood/create')}}" class="button success">New Neighborhood</a></li>
    <li class="divider"></li>
</ul>
@stop
@stop