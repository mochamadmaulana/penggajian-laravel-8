<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('cabang.index') }}"
                class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Cabang Perusahaan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('jabatan.index') }}" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                    Jabatan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('periode.index') }}"
                class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Periode Absen
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
