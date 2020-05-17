@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mx-4 pt-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $cart->getTotalQty() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($cart->getContents() as  $product)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product['product']->title }}</h6>
                                <small class="text-muted">Quantity:{{ $product['qty'] }}</small>
                            </div>
                            <span class="text-muted font-weight-bold">Rs{{ $product['price'] }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rs)</span>
                        <strong>Rs.{{ $cart->getTotalPrice() }}</strong>
                    </li>
                </ul>
            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                @include('layouts.partials.message')
                <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required="">
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid phone is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address_1" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your address 1.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" name="address_2" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select name="country" class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select name="state" class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip_code" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
