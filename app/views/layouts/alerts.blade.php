<div class="row">
	<div class="large-12 columns">
	@if ($message = Session::get('success'))
	<div data-alert class="alert-box success radius">
	 <strong>Success:</strong> {{ $message }}
	  <a href="#" class="close">&times;</a>
	</div>
	{{ Session::forget('success') }}
	@endif

	@if ($message = Session::get('error'))
	<div data-alert class="alert-box alert radius">
	 <strong>Error:</strong> {{ $message }}
	  <a href="#" class="close">&times;</a>
	</div>
	{{ Session::forget('error') }}
	@endif

	@if ($message = Session::get('warning'))
	<div data-alert class="alert-box warning radius">
	 <strong>Warning:</strong> {{ $message }}
	  <a href="#" class="close">&times;</a>
	</div>
	{{ Session::forget('warning') }}
	@endif

	@if ($message = Session::get('info'))
	<div data-alert class="alert-box info radius">
	 {{ $message }}
	  <a href="#" class="close">&times;</a>
	</div>
	{{ Session::forget('info') }}
	@endif
	</div>
</div>
