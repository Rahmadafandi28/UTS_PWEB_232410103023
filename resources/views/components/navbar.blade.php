<nav class="navbar navbar-expand-lg navbar-custom" style="padding: 1rem 0; background-color: #0F5C3A;">
    <div class="container-fluid">
        <!-- Logo - diperbesar -->
        <img src="{{ asset('img/a.png') }}" alt="" width="60px" height="60px" style="margin-right: 1rem;">
        
        <!-- Brand - diperbesar -->
        <a class="navbar-brand text-white" href="#" style="font-size: 2rem; margin-right: 2rem;">EcoSort</a>
        
        <!-- Toggler - diperbesar -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="transform: scale(1.5); margin-right: 1rem;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <!-- Menu items - diperbesar -->
                <li class="nav-item mx-3">
                    <a class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" style="font-size: 1.3rem; padding: 0.5rem 1rem;">Dashboard</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white {{ request()->is('pengelolaan') ? 'active' : '' }}" href="{{ route('pengelolaan') }}" style="font-size: 1.3rem; padding: 0.5rem 1rem;">Pengelolaan</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile') }}" style="font-size: 1.3rem; padding: 0.5rem 1rem;">Profile</a>
                </li>
            </ul>

            <!-- Dropdown user - diperbesar -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 1.5rem; padding: 0.5rem 1rem;">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="font-size: 1.2rem;">
                        <li>
                            <div class="dropdown-header px-3 py-2">
                                <div class="fw-bold" style="font-size: 1.2rem;">{{ session('user_name') }}</div>
                                <small class="text-muted" style="font-size: 1rem;">{{ session('user_email') }}</small>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" style="font-size: 1.2rem; padding: 0.5rem 1rem;">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
