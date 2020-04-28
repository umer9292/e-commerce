@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
@endsection
@section('content')
    <div class="jumbotron">
        <div class="row text-center">
            <h1>Product :</h1>
        </div>
        <div class="card bg-light" style="padding: 20px">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/'. $productImage->file_name) }}" alt="{{ $product->title }}" width="150px">
                    </div>
                    <div class="col-md-8 ">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p>{!! $product->description !!}</p>
                        <hr>
                <small class="text-primary">Created At {{diff4Human($product->created_at)}} By {{\Illuminate\Support\Facades\Auth::user()->name}}</small>
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <div class="btn-group">
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-outline-success btn-sm mr-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    {!! Form::open(['route' =>  ['product.destroy', $product->id], 'method' => 'POST']) !!}
                        @method('DELETE')
                        {{ Form::button('<i class="fas fa-trash-alt"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm',]) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
