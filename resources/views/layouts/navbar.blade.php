<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">About us</a>
                </li>
                <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                </li>
                <li>
                <form class="d-flex" action="{{ request()->url() }}" method="GET" style="max-width: 250px; width: 100%;">
                <input 
                type="search" 
                id="search-bar" 
                name="query" 
                class="form-control me-2 rounded-pill px-2" 
                placeholder="Search" 
                autocomplete="off"
                style="border: 1px solid white; background-color: transparent; color: white; padding: 4px; flex: 1;">
                <button type="submit" class="btn btn-outline-light rounded-pill px-3">Go</button>
                </form>
                <div id="suggestion" class="dropdown-menu" style="width: 250px; display: none; color: red !important;"></div>
                </li>
                @if (Route::has('login'))
                    @auth
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif

                <li class="nav-item {{ Request::is('cart.view') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('cart.view') }}">
                        <img src="/build/assets/images/cart.svg" alt="Cart"> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
