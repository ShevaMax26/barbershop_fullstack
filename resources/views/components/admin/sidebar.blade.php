<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('main.index') }}" class="brand-link">
        <i class="fab fa-laravel ml-3 mr-2" style="color: #ca1616;"></i>
        <span class="brand-text font-weight-light">Laravel-shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--                <div class="image">--}}
            {{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            {{--                </div>--}}
            <div class="info">
                <a href="#" class="d-block">Maxym Shevchuk</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Замовлення</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('barber.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Барбери</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('branch.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Філії</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cut"></i>
                        <p>
                            Послуги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service-detail.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>Ціни та час</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rank.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-award"></i>
                        <p>Ранги</p>
                    </a>
                </li>
                @role('super-admin')
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Ролі</p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
