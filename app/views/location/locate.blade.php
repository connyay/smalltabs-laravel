@extends('location.master')

@section('title')
Choose City
@stop

@section('content')
<div class="row">
	<div class="large-12 columns">
		<a class="th radius" href="{{ route('set.location', array('city'=>'chicago')) }}">
		  <img src="{{ asset('img/ord-skyline.png') }}" title="Chicago" />
		</a>
	</div>
</div>
<br>
<div class="row">
	<div class="large-12 columns">
		<a class="th radius" href="{{ route('set.location', array('city'=>'raleigh')) }}">
		  <img src="{{ asset('img/rdu-skyline.png') }}" title="Raleigh-Durham" />
		</a>
	</div>
</div>
<br><br>
@stop