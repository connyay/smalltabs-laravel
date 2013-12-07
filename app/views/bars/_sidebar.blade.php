<div class="large-4 columns">
<h5>Connect with {{ $bar->name }}</h5>

<ul>
	<li><a href="tel:{{ $bar->phonenumber }}" title="Call {{ $bar->name }}">{{ $bar->phonenumber }}</a></li>
	@if(isset($bar->website))
	<li><a href="{{$bar->website}}" target="_blank">{{ $bar->name }} Website</a></li>
	@endif
	@if(isset($bar->facebook))
	<li><a href="{{$bar->facebook}}" target="_blank">Like {{ $bar->name }} on Facebook</a></li>
	@endif
	@if(isset($bar->twitter))
	<li><a href="{{$bar->twitter}}" target="_blank">Follow {{ $bar->name }} on Twitter</a></li>
	@endif
	@if(isset($bar->yelp))
	<li><a href="{{$bar->yelp}}" target="_blank">Review {{ $bar->name }} on Yelp</a></li>
	@endif
</ul>
</div>