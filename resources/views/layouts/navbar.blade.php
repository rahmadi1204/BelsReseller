<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Instagram"
                href="https://www.instagram.com/belshouse/">
                <i class="fab fa-instagram text-danger"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
        </li> --}}
        <!-- Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-cogs text-info"></i>
                {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Nama User</span>
                <div class="dropdown-divider"></div>
                <a href="/change-password" class="dropdown-item">
                    <i class="fas fa-key mr-2 text-warning"></i> Ganti Password
                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="/profile" class="dropdown-item">
                    <i class="fas fa-user mr-2 text-success"></i> Profil
                    {{-- <span class="float-right text-muted text-sm">12 hours</span> --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item">
                    <i class="fas fa-power-off mr-2 text-danger"></i> Logout
                    {{-- <span class="float-right text-muted text-sm">2 days</span> --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">{{ date('D, d F Y') }}</a>
            </div>
        </li>
    </ul>
</nav>
