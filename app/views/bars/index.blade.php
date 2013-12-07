@section('content')

@foreach($bars as $bar)
	@include('bars._view')
@endforeach

@stop
