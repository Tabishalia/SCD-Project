<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="/shop">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="/about">About us</a>
                </li>
                <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                    <a class="nav-link" href="/services">Services</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="/contact">Contact us</a>
                </li>
            </ul>

            <!-- Styled Search Form -->
            <form class="d-flex ms-3" action="##" method="GET" style="max-width: 250px; width: 100%;">
            <input class="form-control me-2 rounded-pill px-2" type="search" placeholder="Search" aria-label="Search" name="query" 
           style="border: 1px solid white; background-color: transparent; color: white; padding-top: 4px; padding-bottom: 4px;">
             <button class="btn btn-primary rounded-pill px-3" type="submit">Go</button>
            </form>



            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
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

                <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                    <a class="nav-link" href="/cart">
                        <img src="/build/assets/images/cart.svg" alt="Cart">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
