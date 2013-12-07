@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

<div class="row">
	<div class="large-4 large-offset-4 columns">
		<div class="panel">
		<h3 class="text-center">Login</h3>
		<hr>

		{{ Form::open(array('url' => 'login')) }}

		<div class="row">
			<div class="large-12 columns">
			{{ Form::text('username', Input::old('username'), array('autofocus' => 'autofocus', 'placeholder' => 'Username')) }}
			</div>
		</div>

		<div class="row">
			<div class="large-12 columns">
			{{ Form::password('password', array('placeholder' => 'Password')) }}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
			{{ Form::submit('Login', array('class' => 'button expand')) }}
			</div>
		</div>
		{{ Form::close() }}

		</div>
	</div>
</div>

@stop
