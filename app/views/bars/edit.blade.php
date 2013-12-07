@if($title = "Edit ". $bar->name) @endif
@section('title')
{{ $title }}
@stop
@section('content')
<div class="row">
<div class="large-8 columns">
	<h2>{{ $title }}</h2>
{{ Form::model($bar, array('method'=>'put', 'route' => array('bar.update', $bar->id))) }}

	@include('bars._form')

{{ Form::close() }}

@stop
