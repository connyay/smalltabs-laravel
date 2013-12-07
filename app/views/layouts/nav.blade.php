<?php
// MOVE ALL THIS TO A FACADE
use Carbon\Carbon;
$days = array( "Sun"=>"Sunday", "Mon"=>"Monday", "Tue"=>"Tuesday", "Wed"=>"Wednesday", "Thu"=>"Thursday",
   "Fri"=>"Friday", "Sat"=>"Saturday" );
$i = 0;
?>
@if(!isset($current))
@if($current = Carbon::now()->dayOfWeek) @endif
@endif

<div class="contain-to-grid fixed">
<nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="{{ URL::to('') }}">SmallTabs</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <ul class="left">
        @foreach (array_keys($days) as $day)
        <li class="divider"></li>
        <li {{ ($i == $current) ? 'class="active"' : '' }} ><a href="{{ URL::to('day', array('day'=>$days[$day])) }}">{{ $day }}</a></li>
        @if($i++) @endif
        @endforeach
        <li class="divider"></li>
      </ul>
      <ul class="right">
        <li class="has-dropdown">
          <a class="name" href="{{ URL::to('') }}">{{ Config::get('city.name') }}</a>
          <ul class="dropdown">
            <li><a href="{{ URL::to(Config::get('app.url') . '/location') }}">Change City</a></li>
          </ul>
        </li>
      </ul>
      @if (Auth::check())
       @yield('actions')  
       @endif
    </section>

  </nav>
</div>
