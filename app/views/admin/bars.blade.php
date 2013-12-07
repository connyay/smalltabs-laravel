@section('title')
Manage Bars
@stop
@section('content')
<div class="row">
	<div class="large-12 columns">
		<h2>Manage Bars <small>{{ $bars->getTotal() }}</small></h2>
		<table>
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Neighborhood</th>
		      <th>Address</th>
		      <th>Number</th>
		      <th>Specials</th>
		      <th>Operations</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($bars as $bar)
		    <tr>
		    	<td> {{ $bar->link() }} </td>
		    	<td> {{ $bar->neighborhood->name }} </td>
		    	<td> {{ $bar->address }} </td>
		    	<td> {{ $bar->phonenumber }} </td>
		    	<td class="text-center"> {{ $bar->specials->count() }} </td>
		    	<td> <a href="{{ route('admin.bar.edit', $bar->id) }}">Edit</a> | <a href="{{ route('bar.destroy', $bar->id) }}" data-token="{{Session::token()}}" data-method="delete" class="action_confirm">Delete</a></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>

		<div class="text-center">
			{{ $bars->links() }}
		</div>
	</div>
</div>
@stop

@section('actions')
<ul class="right">
    <li class="divider"></li>
    <li><a href="{{ route('admin.newbar') }}" class="button success">New Bar</a></li>
    <li class="divider"></li>
</ul>
@stop
