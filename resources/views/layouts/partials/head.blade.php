<button type="button" class="navbar-toggler ml-auto mb-2 bg-light" data-toggle="collapse" data-target="#myNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
        <div class="row">
            <!--  sidebar  -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
                <a href="#" class="navbar-brand text-white text-center d-block mx-auto mb-4 py-3  bottom-border">CodeAndCreate</a>
                <button type="button" class="navbar-toggler ml-auto mb-2" data-toggle="collapse" data-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="bottom-border pb-3">
                    <img src="{{url('storage/images/avtar1.jpeg')}}" alt="no-pic" width="50" class="rounded-circle mr-3">
                    <a href="#" class="text-white"></a>
                </div>
                <ul class="navbar-nav flex-column mt-4">
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link text-white current">
                            <i class="fas fa-home mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link text-white   sidebar-link">
                            <i class="fas fa-envelope mr-3"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white  sidebar-link">
                            <i class="fas fa-user mr-3"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white   sidebar-link">
                            <i class="fas fa-shopping-cart mr-3"></i> Product Images
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white  sidebar-link">
                            <i class="fas fa-jedi-order mr-3"></i> Manage Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white  sidebar-link">
                            <i class="fas fa-users mr-3"></i> Manage Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white   sidebar-link">
                            <i class="fas fa-wrench mr-3"></i> Setting
                        </a>
                    </li>
                </ul>
            </div>
            <!--  end of sidebar  -->
            <!--  top-nav  -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                    </div>

                    <div class="col-md-5">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control search-input" placeholder="Search.. ">
                                <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <ul class="navbar-nav">
                            <li class="nav-item  ml-md-auto">
                                <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#sign-out">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--  end of top-nav  -->

        </div>
    </div>
</div>
