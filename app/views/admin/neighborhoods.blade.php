@section('title')
Manage Neighborhoods
@stop
@section('content')
<div class="row">
	<div class="large-12 columns">
		<h2>Manage Neighborhoods <small>{{ $neighborhoods->getTotal() }}</small></h2>
		<table>
		  <thead>
		    <tr>
		      <th>Name</th>
		      <th>Bars</th>
		      <th>Operations</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($neighborhoods as $neighborhood)
		    <tr>
		    	<td> {{ $neighborhood->link() }} </td>
		    	<td class="text-center"> {{ $neighborhood->bars->count() }} </td>
		    	<td> <a href="{{ route('neighborhood.edit', $neighborhood->name) }}">Edit</a> | <a href="{{ route('neighborhood.destroy', $neighborhood->id) }}" data-token="{{Session::token()}}" data-method="delete" class="action_confirm">Delete</a></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<div class="text-center">
			{{ $neighborhoods->links() }}
		</div>
	</div>
</div>
@stop

@section('actions')
<ul class="right">
    <li class="divider"></li>
    <li><a href="{{ route('admin.newneighborhood') }}" class="button success">New Neighborhood</a></li>
    <li class="divider"></li>
</ul>
@stop
