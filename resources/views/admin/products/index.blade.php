@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Products</li>
@endsection
@section('content')
    @include('layouts.partials.message')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Product List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('product.export.pdf')}}" class="btn btn-sm btn-outline-danger mr-1">
                <i class="fas fa-file-pdf"></i> Export PDF
            </a>
            <a href="{{route('product.create')}}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
    </div>

    <table class="table table-dark table-hover text-center">
        <thead>
        <tr class="text-muted">
            <th>No</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Product Weight</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($products->count() > 0)
            @foreach($products as $product)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$product->title}}</td>
                    <td>{!! substr($product->description, 0, 15) !!}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->weight}}</td>
                    <td>{{diff4Human($product->created_at)}}</td>
                    <td>
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-outline-warning btn-sm mr-2">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Info - Product Not Found</strong>
                    </div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    {{$products->links()}}
@endsection
