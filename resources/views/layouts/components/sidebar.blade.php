<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/" class="brand-link">
            <span class="brand-text fw-light">Laravel App</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link {{ Request::is('register') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Create an Account</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>