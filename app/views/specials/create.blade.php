@section('title')
New Special
@stop
@section('content')
<div class="row">
<div class="large-8 columns">
	<h2>New Special</h2>
{{ Form::open(array('route' => 'special.store')) }}

	@include('specials._form')

{{ Form::close() }}
</div>
</div>
@stop
