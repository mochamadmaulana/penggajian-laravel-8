<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">MENU</li>
        <li class="nav-item">
            <a href="{{ route('accounting.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('accounting.karyawan.index') }}"
                class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Karyawan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('accounting.gaji.index') }}"
                class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                    Gaji
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
