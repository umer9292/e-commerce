@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Order Status</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Status List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('orderStatus.create')}}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-plus"></i> New Order Status
            </a>
        </div>
    </div>
    <table class="table table-responsive-sm table-bordered table-secondary table-hover text-center">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Color</th>
                <th scope="col">Is Paid</th>
                <th scope="col">Is Delivered</th>
                <th scope="col">Is Active</th>
                <th scope="col">Is Deleted</th>
            </tr>
        </thead>
        <tbody>
                @if($orderStatuses->count() > 0)
                    @foreach($orderStatuses as $orderStatus)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$orderStatus->title}}</td>
                            <td style="background-color: {{$orderStatus ? $orderStatus->color : 'blue'}};">{{$orderStatus->color}}</td>
                            <td>
                                @if($orderStatus->is_paid == 0)
                                    <i class="fas fa-times fa-2x text-danger"></i>
                                @else
                                    <i class="fas fa-check fa-2x text-success"></i>
                                @endif
                            </td>
                            <td>
                                @if($orderStatus->is_delivered == 0)
                                    <i class="fas fa-times fa-2x text-danger"></i>
                                @else
                                    <i class="fas fa-check fa-2x text-success"></i>
                                @endif
                            </td>
                            <td>
                                @if($orderStatus->is_active == 0)
                                    <i class="fas fa-times fa-2x text-danger"></i>
                                @else
                                    <i class="fas fa-check fa-2x text-success"></i>
                                @endif
                            </td>
                            <td>
                                @if($orderStatus->is_deleted == 0)
                                    <i class="fas fa-times fa-2x text-danger"></i>
                                @else
                                    <i class="fas fa-check fa-2x text-success"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle"></i>
                                Order Status is not found!
                            </div>
                        </td>
                    </tr>
                @endif
        </tbody>
    </table>
    {{$orderStatuses->links()}}

@endsection
