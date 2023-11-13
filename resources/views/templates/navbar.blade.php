 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" >
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-4">

      <div class="dropdown">
        <div class="profile-icon" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{-- <i class="fa-regular fa-user"></i> --}}
          
          <div style="display: inline-block;">
            <h6 style="display: inline; margin: 0;">
                <i class="bi bi-person-circle mt-3" style="font-size: 31px; color:#7f7f7f;"></i>
                {{ Auth::user()->name }}
            </h6>
            <i style="color: #7f7f7f; vertical-align: middle;" class="fa-solid fa-caret-down ml-2"></i>
        </div>
        
          
        </div>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown" style="right: -10px; left: auto;">
          <li><a class="dropdown-item" href="{{ route('projects.profileEdit') }}">{{ __('Profil') }}</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Déconnexion') }}
              </a>
            </form>
          </li>
        </ul>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

