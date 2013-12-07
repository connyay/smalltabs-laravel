@section('title')
Edit Special
@stop
@section('content')
<div class="row">
<div class="large-8 columns">
	<h2>Edit Special</h2>
{{ Form::model($special, array('method'=>'put', 'route' => array('special.update', $special->id))) }}

	@include('specials._form')

{{ Form::close() }}
</div>
</div>
@stop
