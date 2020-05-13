@extends('layouts.app')

@section('content')
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('storage/images/bg.jpg')}}" class="d-block w-100" alt="Slide 1" height="400px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/banner2.jpg')}}" class="d-block w-100" alt="Slide 2" height="400px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/a.jpg')}}" class="d-block w-100" alt="Slide 3" height="400px">
                    </div>
                </div>
            </div>

            <section class="bg-light">
                    <div class="row">
                        <div class="col-md-12 text-center">
                        <h3 class=" mt-3 mb-5">Up to 70% off. All the brands you love.</h3>
                        </div>
                    </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img src="{{asset('storage/images/bg.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img src="{{asset('storage/images/bg.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img src="{{asset('storage/images/bg.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img src="{{asset('storage/images/bg.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
