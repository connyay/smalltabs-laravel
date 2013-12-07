@if ($showMenus)
<p class="text-right"><a href="{{ route('special.create', array('bar'=>$barid, 'type'=>$type, 'day'=>$day)) }}">Create</a></p>
@endif