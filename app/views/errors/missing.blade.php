@extends('layouts.master')

@section('title')
404
@stop

@section('content')

<div class="row">
  <div class="large-9 medium-9 small-12 columns small-centered">
    <h1>404: 
    	@if(isset($message) && !empty($message))
    	{{ $message }}
    	@else
    	Page Not Found
    	@endif
    </h1>
 
    <p class="lead">Double check the URL or head back to the <a href="{{ URL::to('') }}">homepage.</a><br>Contact us if you continue to get this page.</p>
    
  </div>
</div>

@stop