<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="{{ url('/') }}" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">Infotech</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                @foreach($menus as $menu)
                    @if($menu->submenus->count() > 0)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="menuDropdown{{ $menu->id }}" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $menu->name }}
                            </a>
                            <div class="dropdown-menu animated-dropdown" aria-labelledby="menuDropdown{{ $menu->id }}">
                                @foreach($menu->submenus as $submenu)
                                    <a href="{{ url(is_string($submenu->url) ? $submenu->url : '#') }}" class="dropdown-item">
                                        {{ $submenu->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ url(is_string($menu->url) ? $menu->url : '#') }}" class="nav-item nav-link">{{ $menu->name }}</a>
                    @endif
                @endforeach
            </div>
            <div>
                <a href="{{ url('login') }}" class="btn btn-primary px-4 me-3">Login</a>
                <a href="{{ url('register') }}" class="btn btn-primary px-4">Register</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Custom Dropdown CSS -->
<style>
    .dropdown-menu {
        display: none;
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-menu a {
        padding: 10px 15px;
        transition: background 0.3s ease-in-out;
    }

    .dropdown-menu a:hover {
     
        color: white;
    }

    .navbar-nav .nav-item {
        position: relative;
    }

    .nav-link {
        padding: 10px 15px;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:hover {
        color: #007bff;
    }
</style>

<!-- Bootstrap JS & Popper.js (Required for Dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
