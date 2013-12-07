@if($fSpecials = SmallTabs::formatBarSpecials( $bar->specials ))  @endif
@if($showMenus = Auth::check()) @endif
@foreach($fSpecials as $special)
@if($day = $special['day']) @endif
<div class="panel">
<h4 class="subheader">{{ $day }} Specials</h4>
<hr>
<p>
	<strong>Food:</strong>
	@if(!empty($special['Food']))
		{{ $special['Food']->description }}
	</p>
		@include('specials._manage', array('id'=>$special['Food']->id, 'show'=>$showMenus))
	@else
		None
	</p>
		@include('specials._create', array('barid'=>$bar->id, 'show'=>$showMenus, 'type'=>'Food', 'day'=>$day))
	@endif
<hr>
<p>
	<strong>Drink:</strong>
	@if(!empty($special['Drink']))
		{{ $special['Drink']->description }}
	</p>
		@include('specials._manage', array('id'=>$special['Drink']->id, 'show'=>$showMenus))
	@else
		None
	</p>
		@include('specials._create', array('barid'=>$bar->id, 'show'=>$showMenus, 'type'=>'Drink', 'day'=>$day))
	@endif

@if(!empty($special["Event"]))
<hr>
<p>
	<strong>Event:</strong> {{$special["Event"]->description}}
</p>
@include('specials._manage', array('id'=>$special['Event']->id, 'show'=>$showMenus))
@endif
</div>

@endforeach
