<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('userprofile.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Customer Profile') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bookings.show') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Travel Booking') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hotel_bookings.show') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Hotel Booking') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
