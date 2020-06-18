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
                <a class="nav-link" data-toggle="collapse" href="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                    <i class="fas fa-list-alt"></i>
                    Categories
                </a>
                <div class="list-group collapse" id="categoryCollapse">
                    <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Add New Category</a>
                    <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">Category List</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#productCollapse" aria-expanded="false" aria-controls="productCollapse">
                    <i class="fas fa-tags"></i>
                    Products
                </a>
                <div class="list-group collapse" id="productCollapse">
                    <a href="{{route('product.create')}}" class="list-group-item list-group-item-action">Add New Product</a>
                    <a href="{{route('product.index')}}" class="list-group-item list-group-item-action">Product List</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >
                    <i class="fas fa-images"></i>
                    Product Images
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" role="button" href="#collapseOrder" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOrder">
                    <i class="fas fa-shopping-cart"></i>
                    Manage Orders
                </a>
                <div class="list-group collapse" id="collapseOrder">
                    <a href="{{route('order.index')}}" class="list-group-item list-group-item-action">Order List</a>
                    <a href="{{route('orderStatus.index')}}" class="list-group-item list-group-item-action">Order Status</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" role="button" href="#collapseShipping" data-toggle="collapse" aria-expanded="false" aria-controls="collapseShipping">
                    <i class="fas fa-file-alt"></i>
                    Shipping
                </a>
                <div class="list-group collapse" id="collapseShipping">
                    <a href="" class="list-group-item list-group-item-action">Shipping Dashboard</a>
                    <a class="list-group-item list-group-item-action collapsed"  role="button" href="#collapseLabels" data-toggle="collapse" aria-expanded="false" aria-controls="collapseLabels">
                        Labels
                    </a>
                    <div class="list-group collapse" id="collapseLabels">
                        <a href="{{route('label.index')}}" class="list-group-item list-group-item-action padding-left">Stamp Labels</a>
                        <a href="" class="list-group-item list-group-item-action padding-left">My Pack Labels</a>
                        <a href="" class="list-group-item list-group-item-action padding-left">Send AgainLabels</a>
                    </div>
                </div>
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
                <a class="nav-link" href="{{url('/log-viewer/')}}">
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
