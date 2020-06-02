{{--<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3">--}}
{{--                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SEERSOL</a>--}}
{{--            </div>--}}
{{--            <div class="col-md-5">--}}

{{--            </div>--}}
{{--            --}}{{--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
{{--            <div class="col-md-4">--}}
{{--                <ul class="navbar-nav px-3">--}}
{{--                    <li class="nav-item text-nowrap">--}}
{{--                        <a class="nav-link" href="#">Sign out</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav class="navbar navbar-expand-sm sticky-top bg-dark flex-md-nowrap pt-1 pb-1">

    <div class="col-md-2">
        <a class="navbar-brand" href="#">Seersol</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="col-md-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> <i class="fas fa-home"></i> &nbsp;Dashboard</a></li>
                @yield('breadcrumbs')
            </ol>
        </nav>
{{--        <form>--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" class="form-control search-input" placeholder="Search.. ">--}}
{{--                <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i></button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </div>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-danger mr-3"  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</nav>
