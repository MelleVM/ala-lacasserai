{{-- inc/sidebar.blade.php  --}}

<div class="sidebar-wrapper-big chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="/"></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">{!!str_limit(Auth::user()->name, 14)!!}  
          </span>
          <span class="user-role">
            @if (Auth::user()->role_id == 3)
            Administrator
            @elseif (Auth::user()->role_id == 2)
            Moderator
            @endif
           
          </span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
            <a href="/" class="btn btn-primary text-white"><i class="far fa-caret-square-left"></i>&nbsp;&nbsp;Back to main website</a>

        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-link">
            <a href="/admin/rooms">
              <i class="fas fa-hotel"></i>
              <span>Rooms</span>
            </a>
          </li>
          <li class="sidebar-link">
            <a href="/admin/users">
              <i class="fas fa-users"></i>
              <span>Users</span>
            </a>
          </li>
          <li class="sidebar-link">
            <a href="/admin/bookings">
              <i class="fas fa-book"></i> 
              <span>Bookings</span>
            </a>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="/admin/documentation">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="fa fa-power-off"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form> 
      

    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">

  </main>
  <!-- page-content" -->
</div>
<!-- sidebar-wrapper-big -->