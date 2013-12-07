@if($title = "Bars in " . $neighborhood->name) @endif
@section('title')
{{ $title }}
@show

@section('content')
<div class="row">
	<div class="large-12 columns">
		@include('layouts.sidebar')
		<div class="large-8 large-pull-4 columns">
		<h2>{{ $title }}</h2>
		@if(isset($neighborhood->note) && !empty($neighborhood->note))
		<p><strong>Important!</strong> {{ $neighborhood->note }}</p>
		@endif
		@foreach($bars as $bar)
		<div class="panel">
			@include('neighborhoods._bar')
		</div>
		@endforeach
		@if($bars->isEmpty())
		<h4>No Bars Found</h4>
		@endif
		</div>
	</div>
</div>
@stop
