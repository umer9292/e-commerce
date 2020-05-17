<nav class="navbar navbar-expand-sm navbar-light background">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Seersol</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.all')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brands
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline search_field">
                    <button class="search_button" type="submit"><i class="fas fa-search"></i></button>
                    <input class="form-control search_input" type="search" placeholder="What are you looking for?" aria-label="Search">
                </form>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="authNavbar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{--                    <i class="fas fa- fa-2x"></i>--}}
                        <i class="far fa-user fa-2x"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="authNavbar">

                        <div class="py-3 px-3" style="width: 275px !important;">
                            <h5 class="text-center mb-4">Welcome to Seersol</h5>
                            <!-- Authentication Links -->
                            @guest
                                <a class="btn btn-block btn-light" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                <a class="btn btn-block btn-danger" href="{{ route('login') }}">{{ __('Log in') }}</a>
                            @else
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            @endguest
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action text-dark">Sell</a>
                            <a href="#" class="list-group-item list-group-item-action text-dark">Help Center</a>
                        </div>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link icon-parent" href="{{route('products.cart')}}">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                        <span>5</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
