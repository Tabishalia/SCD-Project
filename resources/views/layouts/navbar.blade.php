<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                <a class="nav-link" href="/shop">Shop</a>
                 </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
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
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                     <a class="nav-link" href="/about">About us</a>
                </li>
                
            </li>
        </ul>
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            
            @if (Route::has('login'))
            @auth
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            @else
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('login') }}">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item ">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @endauth
            @endif
            

		<li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
        <a class="nav-link" href="/cart"><img src="/build/assets/images/cart.svg"></a></li>
	</ul>
	</div>
	</div>
				
		</nav>