<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 px-0 px-lg-5" style="background: linear-gradient(90deg, #0a0f24, #0f3460); border-bottom: 2px solid #00f7ff;">
        <a href="{{ url('/') }}" class="navbar-brand font-weight-bold text-white d-flex align-items-center" style="font-size: 40px">
            <i class="flaticon-043-shield me-2"></i>
            <span class="text-neon">FraudXpert AI</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                @foreach($menus as $menu)
                    @if($menu->submenus->count() > 0)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-glow menu-item" id="menuDropdown{{ $menu->id }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $menu->name }}
                            </a>
                            <div class="dropdown-menu animated-dropdown glassmorphism" aria-labelledby="menuDropdown{{ $menu->id }}">
                                @foreach($menu->submenus as $submenu)
                                    <a href="{{ url(is_string($submenu->url) ? $submenu->url : '#') }}" class="dropdown-item text-glow submenu-item">
                                        {{ $submenu->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ url(is_string($menu->url) ? $menu->url : '#') }}" class="nav-item nav-link text-white text-glow menu-item">{{ $menu->name }}</a>
                    @endif
                @endforeach
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ url('login') }}" class="btn btn-neon me-3" style="margin-right: 20px;">Login</a>
                <a href="{{ url('register') }}" class="btn btn-outline-neon" style="margin-right: 20px;">Register</a>
               <!-- Dashboard User Icon with Advanced Styling -->
<a href="{{ url('panel/dashboard') }}" title="Go to Dashboard" class="user-dashboard-link">
    <i class="fas fa-user-circle user-icon"></i>
    <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
</a>

            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Advanced Custom CSS -->
<style>
    /* Base Styles */
    body {
        background: #0a0f24;
        font-family: 'Arial', sans-serif;
    }

    /* Text Neon Glow */
    .text-neon {
        color: #00f7ff;
        text-shadow: 0 0 5px #00f7ff, 0 0 10px #00f7ff, 0 0 20px #00f7ff;
        transition: text-shadow 0.3s ease-in-out;
    }

    .text-neon:hover {
        text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff, 0 0 30px #00f7ff;
    }

    /* Navbar Enhancements */
    .navbar {
        box-shadow: 0 4px 15px rgba(0, 255, 255, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .navbar:hover {
        box-shadow: 0 6px 20px rgba(0, 255, 255, 0.3);
    }
    .user-dashboard-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
    transition: transform 0.3s ease, filter 0.3s ease;
    padding: 10px;
}

.user-dashboard-link:hover {
    transform: translateY(-3px) scale(1.05);
    filter: brightness(1.2);
}

.user-icon {
    font-size: 2.5rem;
    color: #00f7ff;
    text-shadow:
        0 0 5px #00f7ff,
        0 0 10px #00f7ff,
        0 0 20px #00f7ff,
        0 0 40px #0ff;
    animation: pulseGlow 2s infinite;
}



.user-name {
    margin-top: 6px;
    font-size: 14px;
    font-weight: 600;
    color: #00f7ff;
    text-shadow:
        0 0 3px #00f7ff,
        0 0 6px #00f7ff;
    letter-spacing: 0.5px;
    animation: fadeIn 1s ease-in-out;
}

/* Animation: Glowing Pulse */
@keyframes pulseGlow {
    0% {
        text-shadow: 0 0 5px #00f7ff, 0 0 10px #00f7ff;
    }
    50% {
        text-shadow: 0 0 10px #00f7ff, 0 0 20px #0ff, 0 0 30px #0ff;
    }
    100% {
        text-shadow: 0 0 5px #00f7ff, 0 0 10px #00f7ff;
    }
}

/* Animation: Fade In Text */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    /* Enhanced Menu Item Styling */
    .menu-item {
        font-family: 'Orbitron', sans-serif; /* Futuristic font */
        font-size: 15px;
        font-weight: 600;
        color: #ffffff !important;
        padding: 12px 25px !important;
        position: relative;

        letter-spacing: 1px;
        transition: all 0.3s ease-in-out;
    }

    .menu-item:hover, .menu-item.active {
        color: #00f7ff !important;
        text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff;
    }

    /* Underline Effect */
    .menu-item::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 8px;
        left: 50%;
        background: #00f7ff;
        box-shadow: 0 0 5px #00f7ff;
        transition: all 0.3s ease-in-out;
        transform: translateX(-50%);
    }

    .menu-item:hover::after, .menu-item.active::after {
        width: 60%;
    }

    /* Dropdown Styling */
    .dropdown-menu {
        display: none;
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        background: rgba(10, 15, 36, 0.9);
        border: 1px solid #00f7ff;
        border-radius: 8px;
        padding: 10px;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* Submenu Item Styling */
    .submenu-item {
        font-family: 'Roboto Mono', monospace; /* Monospace for submenus */
        font-size: 16px;
        color: #ffffff;
        padding: 8px 20px;
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    .submenu-item:hover {
        color: #00f7ff;
        background: rgba(0, 247, 255, 0.1);
        text-shadow: 0 0 5px #00f7ff;
        padding-left: 25px; /* Slight shift on hover */
    }

    /* Neon Button Effects */
    .btn-neon {
        background: #00f7ff;
        color: #0a0f24;
        font-weight: bold;
        border: 2px solid #00f7ff;
        padding: 8px 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px #00f7ff;
        transition: all 0.3s ease-in-out;
    }

    .btn-neon:hover {
        background: transparent;
        color: #00f7ff;
        box-shadow: 0 0 20px #00f7ff, 0 0 30px #00f7ff;
    }

    .btn-outline-neon {
        border: 2px solid #00f7ff;
        color: #00f7ff;
        padding: 8px 20px;
        border-radius: 5px;
        background: transparent;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-neon:hover {
        background: #00f7ff;
        color: #0a0f24;
        box-shadow: 0 0 15px #00f7ff, 0 0 25px #00f7ff;
    }

    /* Glassmorphism Effect */
    .glassmorphism {
        backdrop-filter: blur(10px);
        background: rgba(15, 52, 96, 0.2);
        border: 1px solid rgba(0, 247, 255, 0.3);
    }

    /* Animated Text Glow */
    .text-glow {
        transition: text-shadow 0.3s ease-in-out;
    }

    .text-glow:hover {
        text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff, 0 0 30px #00f7ff;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .navbar-nav {
            background: rgba(10, 15, 36, 0.95);
            padding: 15px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #00f7ff;
        }
        .menu-item {
            padding: 10px 15px !important;
            font-size: 16px;
        }
        .menu-item::after {
            bottom: 5px;
        }
        .btn-neon, .btn-outline-neon {
            width: 100%;
            margin: 5px 0 !important;
        }
        .dropdown-menu {
            background: rgba(10, 15, 36, 1);
            border: none;
        }
    }

    /* Icon Styling */
    .fas.fa-user-circle {
        font-size: 28px;
        transition: all 0.3s ease-in-out;
    }

    .fas.fa-user-circle:hover {
        color: #00f7ff;
        text-shadow: 0 0 10px #00f7ff;
    }
</style>

<!-- Bootstrap JS & Popper.js (Required for Dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>