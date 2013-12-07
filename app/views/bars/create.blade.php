@section('title')
New Bar
@stop
@section('content')
<div class="row">
<div class="large-8 columns">
	<h2>New Bar</h2>
{{ Form::open(array('route' => 'bar.store')) }}

        @include('bars._form')

{{ Form::close() }}
</div>
</div>
@stop
