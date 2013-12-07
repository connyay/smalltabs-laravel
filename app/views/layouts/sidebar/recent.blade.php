@if($added = SmallTabs::getRecentlyAdded()) @endif
@if($updated = SmallTabs::getRecentlyUpdated()) @endif

<div class="show-for-large-up">
	<h4>Recently Added</h4>
	<ul class="square">
		@if($added->isEmpty())
		<li>No bars found</li>
		@else
		@foreach($added as $bar)
		<li>{{ $bar->link() }} ({{ $bar->neighborhood->name }})</li>
		@endforeach
		@endif
	</ul>

	<h4>Recently Updated</h4>
	<ul class="square">
		@if(!$updated->isEmpty())
		@foreach($updated as $bar)
		<li>{{ $bar->link() }} ({{ $bar->neighborhood->name }})</li>
		@endforeach
		@else 
		<li>No bars found</li>
		@endif
	</ul>
</div>
