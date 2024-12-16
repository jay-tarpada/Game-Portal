 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      <img src="{{ url('assets/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('assets/admin') }}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link  {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>


            <li class="nav-item">
              <a href="{{ url('users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                  Users
                  </p>
              </a>
          </li>
          
            {{-- <li class="nav-item">
                <a href="{{ url('admin/category') }}" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                    Category
                    </p>
                </a>
            </li> --}}

          {{-- <li class="nav-item">
            <a href="{{ url('product') }}" class="nav-link {{ request()->is('product') ? 'active' : '' }}">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                Products
                </p>
            </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ url('games') }}" class="nav-link {{ request()->is('games') ? 'active' : '' }}">
              <i class="nav-icon 	fas fa-gamepad"></i>
              <p>
              Games
              </p>
          </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('/contacts') }}" class="nav-link {{ request()->is('contacts') ? 'active' : '' }}">
            <i class="nav-icon 		far fa-comments"></i>
            <p>
            Contact Messages
            </p>
        </a>
    </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>