<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="fas fa-sign-in-alt me-1"></i> Sign In
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                </li>
            @endguest

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> 
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                        <li>
                            <span class="dropdown-item-text text-muted small pb-1">
                                <i class="fas fa-building me-1"></i> {{ Auth::user()->department }}
                            </span>
                        </li>
                        <li>
                            <span class="dropdown-item-text text-muted small pt-0">
                                <i class="fas fa-id-badge me-1"></i> {{ Auth::user()->designation }}
                            </span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" id="navbar-logout-form" class="d-none">
                                @csrf
                            </form>
                            <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('navbar-logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth

        </ul>
    </div>
</nav>