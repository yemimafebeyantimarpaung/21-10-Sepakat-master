<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
					============================================= -->
					<div id="logo">
                        <a href="{{ url('/') }}" class="standard-logo mt-4" style="font-family: Lobster; font-weight: bold; font-size:25px; color: black; text-decoration:none;">Se<span style="font-family: Lobster; font-weight: bold; font-size:25px; color: green">pakat</span></a>
                    </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul>
                    <!-- Mega Menu
                    ============================================= -->
                    <li><a href="{{ route('beranda.index') }}"  >Home</a></li>

                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else

                        @if(Auth::user()->role=='Buyer')
                            <li><a href="{{ route('wishlist') }}"  >Wishlist</a></li>
                        @else
                            <li><a class="menu-link"  href="{{ route('products.index') }}">Product</a></li>
                        @endif

                        <li><a   href="{{ route('logout') }}">Keluar</a></li>
                    @endguest
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>

</header><!-- #header end -->


