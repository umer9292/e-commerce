<nav class="col-md-2 d-none d-md-block sidebar"  style=" background-image: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.9)),url('{{asset('storage/images/Banner.jpeg')}}');">
    <div class="sidebar-sticky">
        <div class="border_bottom pb-3 pt-3 ml-3">
            <img src="{{url('storage/images/avtar1.jpeg')}}" width="40" class="rounded-circle mr-3">
            <a href="#" class="text-white">{{Auth::user()->name}}</a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link current" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                    <i class="fas fa-list-alt"></i>
                    Categories
                </a>
                <div class="list-group" id="categoryCollapse">
                    <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Add New Category</a>
                    <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">Categories List</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-tag"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-images"></i>
                    Product Images
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users"></i>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-bar"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-bug"></i>
                    Logs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-wrench"></i>
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
