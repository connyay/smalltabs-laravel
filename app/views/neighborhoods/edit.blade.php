@section('content')
<div class="row">
	<div class="large-8 columns">
		<h2>Edit {{ $neighborhood->name }}</h2>
		{{ Form::model($neighborhood, array('method'=>'put', 'route' => array('neighborhood.update', $neighborhood->id))) }}

			@include('neighborhoods._form')

		{{ Form::close() }}
	</div>
</div>
@stop
