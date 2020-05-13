@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('storage/images/2.jpg')}}" class="d-block w-100" alt="Slide 1" height="400px">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/images/8.jpg')}}" class="d-block w-100" alt="Slide 2" height="400px">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/images/6.jpg')}}" class="d-block w-100" alt="Slide 2" height="400px">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/images/3.jpg')}}" class="d-block w-100" alt="Slide 2" height="400px">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('storage/images/5.jpg')}}" class="d-block w-100" alt="Slide 3" height="400px">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="bg-light">
            <div class="row">
                <div class="col-md-12 product-title">
                    <h2 style="margin-bottom: 0 !important;">It's New Products</h2>
                    <strong class="pb-3">We have some new products we'd like you to see. </strong>
                </div>
            </div>
            <div class="container">
                <div class="row">
{{--                    <div class="col-md-3 col-sm-12 img-hover">--}}
{{--                        <img src="{{asset('storage/images/a.jpg')}}" class="img-fluid" alt="product image">--}}
{{--                        <div class="overlay ctr"><a href="" class="btn btn-outline-secondary">Let's Go!</a></div>--}}
{{--                    </div>--}}
                    @if($products->count() > 0)
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-12 mb-3">
                                <div class="img-hover">
                                    <img src="{{asset('storage/'.(!empty($product->productImage->file_name) ? $product->productImage->file_name : 'images/a.jpg'))}}"
                                         alt="product image" style="height: 150px; width: 100%">
                                    <div class="overlay ctr">
                                        <a href="{{route('product.single', $product->id)}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-sm btn-success ml-3">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        {{$products->links()}}
    </div>
@endsection
