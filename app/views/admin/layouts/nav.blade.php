
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
        <li class="divider"></li>
        <li {{ (Request::is('admin') ? 'class="active"' : '') }}><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="divider"></li>
        <li class="has-dropdown">
        <a href="{{ route('admin.bars') }}">Bars</a>
        <ul class="dropdown">
          <li {{ (Request::is('admin/bars') ? 'class="active"' : '') }}><a href="{{ route('admin.bars') }}">List Bars</a></li>
          <li {{ (Request::is('admin/bar/create') ? 'class="active"' : '') }}><a href="{{ route('admin.newbar') }}">Add Bar</a></li>
        </ul>
        <li class="divider"></li>
      </li>
      <li class="has-dropdown">
        <a href="{{ route('admin.neighborhoods') }}">Neighborhoods</a>
        <ul class="dropdown">
          <li {{ (Request::is('admin/neighborhoods') ? 'class="active"' : '') }}><a href="{{ route('admin.neighborhoods') }}">List Neighborhoods</a></li>
          <li {{ (Request::is('admin/neighborhood/create') ? 'class="active"' : '') }}><a href="{{ route('admin.newneighborhood') }}">Add Neighborhood</a></li>
        </ul>
        <li class="divider"></li>
      </li>
      <li class="has-dropdown">
        <a href="{{ route('admin.specials') }}">Specials</a>
        <ul class="dropdown">
          <li {{ (Request::is('admin/specials') ? 'class="active"' : '') }}><a href="{{ route('admin.specials') }}">List Specials</a></li>
          <li {{ (Request::is('admin/special/create') ? 'class="active"' : '') }}><a href="{{ route('admin.newspecial') }}">Add Special</a></li>
        </ul>
        <li class="divider"></li>
      </li>
      </ul>
      <ul class="right">
          <li><a href="{{ route('logout') }}">Logout</a></li>
      </ul>
       @yield('actions')
    </section>

  </nav>
</div>
