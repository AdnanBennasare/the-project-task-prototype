 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" >
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    
  

      <div class="dropdown">
        <div class="profile-icon" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{-- <i class="fa-regular fa-user"></i> --}}
          <h6><i class="bi bi-person-circle mt-3" style="font-size: 31px; color:#7f7f7f;"></i>
            {{ Auth::user()->name }}</h6>
          
        </div>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown" style="right: -50px; left: auto;">
          <li><a class="dropdown-item" href="{{ route('projects.profileEdit') }}">{{ __('Profile') }}</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
              </a>
            </form>
          </li>
        </ul>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

