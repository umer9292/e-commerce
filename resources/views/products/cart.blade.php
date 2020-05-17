@extends('layouts.app')
@section('content')
    <div class="container">
        @if(isset($cart) && $cart->getContents())
            <div class="mb-5">
                <h2 class="cart-heading" style="text-align: center !important;">Your Shopping Cart :)</h2>
            </div>
            <hr>
            <div class="card table-responsive mt-5">
                <table class="table table-dark table-hover shopping-cart-wrap">
                    <thead class="text-primary font-weight-bold">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Weight</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" width="200" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($cart->getContents() as  $product)
                        <tr class="table-dark">
                            <td>
                                <figure class="media">
                                    <div class="img-wrap">
                                        <img src="{{asset('storage/'.getProductImage($product['product']->id)->file_name)}}"
                                             style="width: 90px; height: 115px"
                                             class="img-thumbnail img-sm"
                                             alt=""
                                        >
                                    </div>
                                    <figcaption class="media-body ml-2">
                                        <h6 class="title text-truncate">{{$product['product']->title}}</h6>
                                        <dl class="param param-inline small">
                                            <dt>Modal: </dt>
                                            <dd>65fdsf</dd>
                                        </dl>
                                        <dl class="param param-inline small">
                                            <dt>Color: </dt>
                                            <dd>Orange color</dd>
                                        </dl>
                                    </figcaption>
                                </figure>
                            </td>
                            <td>
                                {{$product['product']->weight}} gram
                            </td>
                            <td>
                                <form method="POST" action="{{route('update.product', $product['product']->id)}}" >
                                    @csrf
                                    <input type="number" name="qty" id="qty" class="form-control text-center" min="0" max="99" value="{{$product['qty']}}">
                                    <input type="submit" name="update" value="Update" class="btn btn-block btn-outline-success btn-round mt-3">
                                </form>
                            </td>
                            <td>
                                <div class="price-wrap">
                                    <span class="price">Rs. {{$product['price']}}</span>
                                    <small class="text-muted">(Rs.{{$product['product']->price}} each)</small>
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td class="text-right">
                                <form action="{{route('remove.product', $product['product']->id)}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <input type="submit" name="remove" value="Remove" class="btn btn-outline-danger"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4">Total Qty: </th>
                        <td colspan="1">{{$cart->getTotalQty()}}</td>
                    </tr>
                    <tr>
                        <th colspan="4">Total Price: </th>
                        <td colspan="1">Rs.{{$cart->getTotalPrice()}}.00</td>
                    </tr>
                    <tr>
                        <th colspan="4">Total Weight: </th>
                        <td colspan="1">{{$cart->getTotalWeight()}} grams</td>
                    </tr>
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{route('products.all')}}" class="btn btn-sm btn-warning">
                        <i class="fas fa-chevron-left mr-2"></i>Continue Shopping
                    </a>
                    <a href="{{route('checkout')}}" class="btn btn-sm btn-success text-right">
                        Checkout <i class="fas fa-chevron-right ml-2"></i>
                    </a>
                </div>
            </div> <!-- card.// -->
        @else
            <div class="mb-5">
                <h2 class="cart-heading">Your Shopping Cart :)</h2>
                <a href="{{route('products.all')}}" class="btn shopNow-btn">Shop now</a>
            </div>
            <hr>
        @endif
    </div>
@endsection
