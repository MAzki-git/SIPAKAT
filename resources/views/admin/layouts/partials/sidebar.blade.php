<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--
    <!-- Brand Logo --> --}}
    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPAKAT</span>
    </a>

    {{--
    <!-- Sidebar --> --}}
    <div class="sidebar">
        {{--
        <!-- Sidebar user panel (optional) --> --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                {{-- @auth
                @dd(Auth()->guard('admin'))
                @endauth --}}
                <a href="" class="d-block">{{ Auth::guard('admin')->user()->nama_petugas }}</a>
            </div>
        </div>

        {{--
        <!-- SidebarSearch Form --> --}}
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

        {{--
        <!-- Sidebar Menu --> --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-light fa-house"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">KELOLA</li>
                <li class="nav-item">
                    <a href="/petugas" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Petugas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Masyarakat
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                    <a href="/pengaduan" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Pengaduan</p>
                    </a>
                </li>
                <li class="nav-header">PRINT LAPORAN</li>
                <li class="nav-item">
                    <a href="iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Print laporan</p>
                    </a>
                </li>
                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="/logout/admin" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        {{--
        <!-- /.sidebar-menu --> --}}
    </div>
    {{--
    <!-- /.sidebar --> --}}
</aside>