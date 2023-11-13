 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
   
      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">


          <li class="nav-header">Les Projets & tâches</li>
          <li class="nav-item">
            <a href="{{route('projects.index')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                projets      
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tasks.index')}}" class="nav-link">
              <i class="fa-solid fa-list-check pl-1 pr-2"></i>
              <p>
                tâches
              </p>
            </a>
          </li>
          @if (Auth::user()->role == "project_leader")
          <li class="nav-item">
            <a href="{{route('members.index')}}" class="nav-link">
              <i class="fa-solid fa-users pl-1 pr-1"></i>
              <p>
                membres
              </p>
            </a>
          </li>
          @endif
        

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
