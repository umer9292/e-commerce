@extends('admin.layout')

@section('content')
    <!--  cards  -->
    <section>
        <div class="row">
            <div class="col-xl-3 col-sm-6 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                            <div class="text-secondary text-right">
                                <h5>Sales</h5>
                                <h3>$135,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-secondary">
                        <i class="fas fa-sync mr-3"></i>
                        <span>Updated Now</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <i class="fas fa-money-bill fa-3x text-success"></i>
                            <div class="text-secondary text-right">
                                <h5>Expenses</h5>
                                <h3>$39,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-secondary">
                        <i class="fas fa-sync mr-3"></i>
                        <span>Updated Now</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <i class="fas fa-users fa-3x text-info"></i>
                            <div class="text-secondary text-right">
                                <h5>Users</h5>
                                <h3>15,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-secondary">
                        <i class="fas fa-sync mr-3"></i>
                        <span>Updated Now</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <i class="fas fa-chart-line fa-3x text-danger"></i>
                            <div class="text-secondary text-right">
                                <h5>Visitors</h5>
                                <h3>45,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-secondary">
                        <i class="fas fa-sync mr-3"></i>
                        <span>Updated Now</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  end of card cards  -->

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="digital-clock">00:00:00</div>
            </div>
        </div>
    </div>
@endsection
