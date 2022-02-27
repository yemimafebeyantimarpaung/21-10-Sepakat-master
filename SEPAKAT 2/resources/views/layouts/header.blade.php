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

                            <li><a class="menu-link  {{ Auth::user() ? ( Auth::user()->role=='Supplier' ? '' : 'd-none' ) : 'd-none' }}"  href="{{ route('products.index') }}">Product</a></li>

                            <li>
                                <br>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {{auth()->user()->name}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="/users/{{auth()->user()->id}}" class="dropdown-item" >Profil</a>
                                        <a href="/users/{{auth()->user()->id}}/edit" class="dropdown-item" >Update Profil</a>
                                        <a href="{{ url('/logout') }}" class="dropdown-item" >Logout</a>
                                    </div>
                                </div>
                            </li>
                        @endguest
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>

</header><!-- #header end -->


