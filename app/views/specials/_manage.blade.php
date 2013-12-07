@if ($showMenus)
<p class="text-right"><a href="{{ URL::to('special/'.$id.'/edit')}}">Edit</a> | <a href="{{ URL::to('special/'.$id)}}" data-token="{{Session::token()}}" data-method="delete" class="action_confirm">Delete</a></p>
@endif