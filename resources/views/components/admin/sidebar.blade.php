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
                <a href="#" class="d-block">{{ auth()->user()->name . ' (' . auth()->user()->roles->first()->name . ')'}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('show orders')
                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Замовлення</p>
                        </a>
                    </li>
                @endcan
                @can('show employees')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Працівники
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            @can('show roles')
                                <li class="nav-item">
                                    <a href="{{ route('employee.role.index') }}" class="nav-link pl-4">
                                        <i class="nav-icon fas fa-crown"></i>
                                        <p>Ролі</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('employee.index') }}" class="nav-link pl-4">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Перегляд</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('show branches')
                    <li class="nav-item">
                        <a href="{{ route('branch.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Філії</p>
                        </a>
                    </li>
                @endcan
                @can('show services')
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cut"></i>
                                <p>Послуги</p>
                            </a>
                        </li>
                @endcan
                @can('show service details')
                        <li class="nav-item">
                            <a href="{{ route('service-detail.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>Ціни та час</p>
                            </a>
                        </li>
                @endcan
                @can('show ranks')
                    <li class="nav-item">
                        <a href="{{ route('rank.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-award"></i>
                            <p>Ранги барберів</p>
                        </a>
                    </li>
                @endcan
               @can('show users')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Користувачі</p>
                        </a>
                    </li>
               @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
