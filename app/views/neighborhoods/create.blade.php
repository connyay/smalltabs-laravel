@if($title = "New Neighborhood") @endif
@section('title')
{{ $title }}
@show

@section('content')
<div class="row">
	<div class="large-8 columns">
		<h2>{{ $title }}</h2>
		{{ Form::open(array('route' => 'neighborhood.store')) }}
				
			@include('neighborhoods._form')

		{{ Form::close() }}
	</div>
</div>
@stop
