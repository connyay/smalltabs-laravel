<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>
			@section('title')
			@show
			| SmallTabs
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ stylesheet() }}
		<style>
			@section('styles')
			body.f-topbar-fixed {
				padding-top: 60px;
			}
			@show
		</style>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	 
<div class="contain-to-grid fixed">
<nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="{{ URL::to('') }}">SmallTabs</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

  </nav>
</div>

		<div class="container">

		@include('layouts.alerts')
		@yield('content')
		
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		{{ script() }}
		@yield('scripts')
	</body>
</html>
