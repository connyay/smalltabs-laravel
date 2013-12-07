<h4>Sorry, we don't currently have specials for {{ $bar->name }}.</h4>
<p>You may be able to find information about daily specials and upcoming events on {{ $bar->name }}'s 

@if(isset($bar->website))<a href="{{$bar->website}}" target="_blank">website,</a>@endif
@if(isset($bar->facebook)) <a href="{{$bar->facebook}}" target="_blank">Facebook,</a>@endif
@if(isset($bar->twitter)) <a href="{{$bar->twitter}}" target="_blank">Twitter,</a>@endif

or by calling the establishment at {{ $bar->number() }}.</p>

<h4>Are you associated with {{ $bar->name }}?</h4>
<p>Contact us with your daily specials and events and we'll update this page as soon as possible.</p>