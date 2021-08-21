
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Admin Panel PPOB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/template/dist/img/default.png') }}" class="img-circle elevation-2 bg-dark align-middle" alt="Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ session("user")["fullName"] }}</a>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('administrator/dashboard') }}" class="nav-link {{ ($menu == "home" && $subMenu = "dashboard" ) ? "active" : ""}}">
              <i class="nav-icon fas fa-tachometer-alt align-middle"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-header">REPORT</li> --}}
          {{-- <li class="nav-header">REPORT</li> --}}
          <li class="nav-header">SALDO</li>
          <li class="nav-item">
            <a href="{{ url('administrator/saldo') }}" class="nav-link {{ ($menu == "mutations saldo") ? "active" : ""}}">
              <i class="nav-icon fa fa-exchange-alt align-middle"></i>
              <p>
                Mutations Saldo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('administrator/topupsaldo') }}" class="nav-link {{ ($menu == "top up saldo") ? "active" : ""}}">
              <i class="nav-icon fa fa-credit-card align-middle"></i>
              <p>
              Top Up Saldo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('administrator/topupsaldo/add') }}" class="nav-link {{ ($menu == "create top up saldo") ? "active" : ""}}">
              <i class="nav-icon fa fa-wallet align-middle"></i>
              <p>
                Create Top Up Saldo
              </p>
            </a>
          </li>
          <li class="nav-header">PPOB</li>
          <li class="nav-item">
            <a href="{{ url('administrator/product') }}" class="nav-link {{ ($menu == "products") ? "active" : ""}}">
              <i class="nav-icon fas fa-boxes align-middle"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-header">TRANSACTION</li>
          <li class="nav-item">
            <a href="{{ url('administrator/transaction') }}" class="nav-link {{ ($menu == "transaction") ? "active" : ""}}">
              <i class="nav-icon fas fa-random align-middle"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="{{ url('administrator/setting/profile') }}" class="nav-link {{ ($menu == "profile" && $subMenu = "profile" ) ? "active" : ""}}">
              <i class="nav-icon fas fa-user-edit align-middle"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('administrator/setting/password') }}" class="nav-link {{ ($menu == "change password" && $subMenu = "change password" ) ? "active" : ""}}">
              <i class="nav-icon fas fa-lock align-middle"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link bg-danger">
              <i class="nav-icon fas fa-sign-out-alt align-middle"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>