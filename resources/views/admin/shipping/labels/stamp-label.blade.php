@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Shipping</li>
    <li class="breadcrumb-item active">Labels</li>
    <li class="breadcrumb-item active" aria-current="page">Stamp Labels</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">One line orders with only 1PCS in Qty <strong class="text-success"> [] </strong> </h4>
                        <p class="card-text">
                            Conditions: Weight's 100g <b>AND</b> Order value less than 600 <b>AND</b> Order Qty equal to 1 <br>
                            Qty Per Batch: 100 Orders
                        </p>

                        <strong class="font-weight-bold">List of labels generated today [{{isset($labels) ? count($labels) : 0}}] </strong>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Orders <i class="fas fa-info-circle"></i></th>
                                    <th scope="col">Action <i class="fas fa-info-circle"></i></th>
                                    <th scope="col">Generated on</th>
                                    <th scope="col">Packing List</th>
                                    <th scope="col">Files <i class="fas fa-info-circle"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($labels) && $labels->count() > 0)
                                    @foreach($labels as $label)
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-info" role="alert">
                                                <i class="fas fa-info-circle"></i>&nbsp; No, generated label found :)
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <a href="#" class="btn btn-success btn-block">Generate Labels</a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title font-weight-bold">One line orders with more than 1PCS in Qty <strong class="text-success"> [] </strong> </h4>

                        <p class="card-text">
                            Conditions: Weight's 100g <b>AND</b> Order value less than 600 <b>AND</b> Order Qty equal to 1 <br>
                            Qty Per Batch: 100 Orders
                        </p>

                        <strong class="font-weight-bold">List of labels generated today [{{isset($labels) ? count($labels) : 0}}] </strong>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Orders <i class="fas fa-info-circle"></i></th>
                                <th scope="col">Action <i class="fas fa-info-circle"></i></th>
                                <th scope="col">Generated on</th>
                                <th scope="col">Packing List</th>
                                <th scope="col">Files <i class="fas fa-info-circle"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($labels) && $labels->count() > 0)
                                @foreach($labels as $label)
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info" role="alert">
                                            <i class="fas fa-info-circle"></i>&nbsp; No, generated label found :)
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <a href="#" class="btn btn-success btn-block">Generate Labels</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title font-weight-bold">Two or more line orders with more than 1PCS in Qty <strong class="text-success"> [] </strong> </h4>

                        <p class="card-text">
                            Conditions: Weight's 100g <b>AND</b> Order value less than 600 <b>AND</b> Order Qty equal to 1 <br>
                            Qty Per Batch: 100 Orders
                        </p>

                        <strong class="font-weight-bold">List of labels generated today [{{isset($labels) ? count($labels) : 0}}] </strong>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Orders <i class="fas fa-info-circle"></i></th>
                                <th scope="col">Action <i class="fas fa-info-circle"></i></th>
                                <th scope="col">Generated on</th>
                                <th scope="col">Packing List</th>
                                <th scope="col">Files <i class="fas fa-info-circle"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($labels) && $labels->count() > 0)
                                @foreach($labels as $label)
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info" role="alert">
                                            <i class="fas fa-info-circle"></i>&nbsp; No, generated label found :)
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <a href="#" class="btn btn-success btn-block">Generate Labels</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
