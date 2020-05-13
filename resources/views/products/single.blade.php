@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 bg-danger text-white" style="padding: 100px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('storage/'.$productImage->file_name)}}" alt="product image" width="150">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text">{!! $product->description !!}</p>
                                <table>
                                    <tr>
                                        <th width="50%">Price:</th>
                                        <td width="50%"><b>{{$product->price}} Rupees</b></td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Weight:</th>
                                        <td width="50%"><b>{{$product->weight}} grams</b></td>
                                    </tr>
                                </table>

                                <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-block btn-success rounded mt-4"> <i class="fas fa-shopping-cart"></i> Add To Cart </a>
                                <a href="{{route('products.all')}}" class="btn btn-block btn-primary rounded mt-4"> <i class="fas fa-arrow-circle-left"></i> Go Back </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
