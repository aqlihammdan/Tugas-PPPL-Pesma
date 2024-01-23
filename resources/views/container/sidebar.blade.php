<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4 "style="position:fixed">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link ">
      <img src="{{ asset('gambar/pesma.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PESMA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('gambar/people-png.webp') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (auth()->user()->level == "user")
          <li class="nav-item menu-open">
            <a href="{{ route('home') }}" class="nav-link @yield('homeActive')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporan') }}" class="nav-link @yield('laporanActive')">
                  <i class="nav-icon fas bi bi-megaphone-fill"></i>
                  <p>Laporan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link @yield('historyActive')">
                  <i class="nav-icon fas bi bi-clock-history"></i>
                  <p>History</p>
                </a>
              </li>
              
            </ul>
          </li> 
          @endif
          

          @if (auth()->user()->level == "admin")
          <li class="nav-item">
            <a href="{{ route('datasantri')}}" class="nav-link @yield('pembayaranActive')">
              <i class="nav-icon fas bi bi-stickies-fill"></i>
              <p>Data Pembayaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('verifikasidata') }}" class="nav-link @yield('verifyActive')">
              <i class="nav-icon fas bi bi-patch-check-fill"></i>
              <p>Verify</p>
            </a>
          </li>
        
          <li class="nav-item menu-open">
            
          </li>

          @endif

          <li class="nav-item">
            {{-- <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
              </p>
            </a> --}}
            <form action="{{ route('logout') }}" method="post">
              {{ csrf_field() }}
              <button type="submit" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-left"></i>
                <p>
                  Logout
                </p>
              </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>