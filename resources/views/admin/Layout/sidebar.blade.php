<aside class="app-sidebar shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="" class="brand-link">
            <img src="{{ asset('assets/img/admin/logo.png') }}" alt="AdminLTE Logo" class="brand-image" />
            <br>
            <span class="brand-text fw-dark" style="color: #193557;">Admin Safar</span>
        </a>
    </div>
    <div class="sidebar-wrapper" style="background-color: #193557;">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('societes.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Societes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('autocars.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Autocars</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipements.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Equipements</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('autocarequipements.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Autocar Equipements</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('autocaroptions.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Autocar Options</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('options.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p> Options</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
