       {{-- inc/header.blade.php --}}

       <ul id="topnav">
           <div class="container">
               <a href="/">
                   <li class="nav-btn-left" id="logo"><img src="/storage/images/logo-xs.png" alt=""></li>
               </a>
               @if(!Auth::user())
               <a href="/login">
                   <li class="nav-btn-right btn-outline-red" id="login">Login</li>
               </a>
               <a href="/register">
                   <li class="nav-btn-right btn-red" id="register">Register</li>
               </a>
               @else

               <div class="nav-dropdown-container">
                   <!-- Btn-->
                   <button class="btn-dropdown"><span>Account Settings</span> <i class="fas fa-angle-down"></i>
                       <ul class="dropdown">
                           {{-- <li class="active"><a href="#">Profile Information</a></li> --}}
                           <li><a href="/profile">See My Profile</a></li>
                           <li><a href="/bookings">See My Bookings</a></li>
                           @if(Auth::user()->role_id > 1)
                           <li class="active"><a href="/admin">Admin Panel</a></li>
                           @endif

                           <li>
                               <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                   <i class="fas fa-power-off"></i> <span class="log-text">{{ __('Logout') }}</span>
                               </a>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                   style="display: none;">
                                   @csrf
                               </form>
                           </li>
                       </ul>
                   </button>
               </div>
               @endif
           </div>
       </ul>
