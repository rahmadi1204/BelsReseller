@if (Auth::user()->role == 'reseller')
    <aside class="main-sidebar sidebar-light-info elevation-4">
    @else
        <aside class="main-sidebar sidebar-dark-info elevation-4">
@endif
<!-- Brand Logo -->
<a href="/" class="brand-link">
    <img src="{{ asset('/') }}dist/img/belsLogo.png" alt="BelsReseller Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="../../dist/img/resellers/{{ Auth::user()->image ?? 'unnamed.png' }}"
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item {{ $desktop ?? '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-desktop text-success"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/resellers" class="nav-link {{ $desktopReseller ?? '' }}">
                                <i class="fa fa-users nav-icon text-info"></i>
                                <p>Resellers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/products" class="nav-link {{ $desktopProduct ?? '' }}">
                                <i class="fa fa-box text-warning nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ $transaction ?? '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-chart-line text-success"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/resellers" class="nav-link {{ $transactionOrder ?? '' }}">
                                <i class="fa fa-cart-arrow-down nav-icon text-info"></i>
                                <p>Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/products" class="nav-link {{ $transactionReport ?? '' }}">
                                <i class="fa fa-clipboard text-warning nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>

                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="/shopping" class="nav-link">
                        <img src="{{ asset('/') }}dist/img/belsLogo.png" class="nav-icon text-info"></img>
                        <p>Products Belshouse</p>
                    </a>
                </li>
                <li class="nav-item {{ $desktop ?? '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-chalkboard text-success"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/baskets" class="nav-link {{ $desktopBaskets ?? '' }}">
                                <i class="fa fa-shopping-cart nav-icon text-info"></i>
                                <p>Data Keranjang Pesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/orders" class="nav-link {{ $desktopOrders ?? '' }}">
                                <i class="fa fa-exclamation-circle nav-icon text-yellow"></i>
                                <p>Data Status Pesanan</p>
                            </a>
                        </li>


                    </ul>
                </li>
            @endif
            <li class="nav-header">OTHER</li>
            {{-- <li class="nav-item">
                    <a href="https://belshouse.com/home" class="nav-link" target="_blank">
                        <img src="{{ asset('/') }}dist/img/belsLogo.png" class="nav-icon text-info"></img>
                        <p>Official Website</p>
                    </a>
                </li> --}}
            <li class="nav-item">
                <a href="https://www.instagram.com/belshouse/" class="nav-link" target="_blank">
                    <i class="fab fa-instagram text-danger nav-icon"></i>
                    <p>Instagram</p>
                </a>
            </li>
            @if (Auth::user()->role != 'admin')
                <li class="nav-item">
                    <a href="https://wa.me/085155099250/" class="nav-link" target="_blank">
                        <i class="fab fa-whatsapp text-success nav-icon"></i>
                        <p>Whatsapp Admin</p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
