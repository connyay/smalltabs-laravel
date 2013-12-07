@section('title')
{{{ $bar->name }}} Daily Specials
@stop


@section('content')
<div class="row">
<div class="large-12 columns">

<h2>{{ $bar->name }}</h2>
<p class="subheader">
{{ $bar->location() }}
{{ $bar->number(' • ') }}
</p>
</div>

<div class="large-8 columns">
@if(isset($bar->neighborhood->note) && !empty($bar->neighborhood->note))
<p><strong>Important!</strong> {{ $bar->neighborhood->note }}</p>
@endif

@if($bar->specials->isEmpty())
@include('specials.none')
@else
@include('bars._specials')
@endif

<p><strong>Updated:</strong> {{ $bar->lastUpdated() }}</p>
</div>

@include('bars._sidebar')

</div>

@section('actions')
<ul class="right">

    <li class="divider"></li>
    <li><a href="{{ route('special.create', array('bar'=>$bar->id)) }}" class="button success">New Special</a></li>
	<li class="divider"></li>
	<li><a href="{{ route('bar.edit', $bar->id) }}" class="button">Edit</a></li>
	<li class="divider"></li>
	<li><a href="{{ route('bar.destroy', $bar->id) }}" data-token="{{Session::token()}}" data-method="delete" class="button alert action_confirm">Delete</a></li>
	<li class="divider"></li>
</ul>
@stop

@stop