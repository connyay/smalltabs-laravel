@section('title')
Manage Specials
@stop
@section('content')
<div class="row">
	<div class="large-12 columns">
		<h2>Manage Specials</h2>
		<div class="panel">
		DATATABLE...
		</div>
	</div>
</div>
@stop

@section('actions')
<ul class="right">
    <li class="divider"></li>
    <li><a href="{{ route('admin.newspecial') }}" class="button success">New Special</a></li>
    <li class="divider"></li>
</ul>
@stop