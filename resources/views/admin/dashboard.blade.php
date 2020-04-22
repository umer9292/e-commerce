@extends('admin.layout')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

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

    <!--  tables  -->
    <section>
        <div class="row align-items-center">

            <!-- TABLE 1 -->
            <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center">Staff Salary</h3>
                <table class="table bg-light table-striped text-center">
                    <thead>
                    <tr class="text-muted">
                        <th>#</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Date</th>
                        <th>Contact</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>Umer</td>
                        <td>$2000</td>
                        <td>14/08/2019</td>
                        <td><button type="button" class="btn btn-info btn-sm">Message</button></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Amir</td>
                        <td>$4000</td>
                        <td>1/12/2019</td>
                        <td><button type="button" class="btn btn-info btn-sm">Message</button></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Hadi</td>
                        <td>$20000</td>
                        <td>10/08/2019</td>
                        <td><button type="button" class="btn btn-info btn-sm">Message</button></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Tahir</td>
                        <td>$4500</td>
                        <td>14/09/2019</td>
                        <td><button type="button" class="btn btn-info btn-sm">Message</button></td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Ali</td>
                        <td>$1800</td>
                        <td>05/08/2019</td>
                        <td><button type="button" class="btn btn-info btn-sm">Message</button></td>
                    </tr>
                    </tbody>
                </table>

                <!-- Paginaton -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link py-2 px-3">
                                1
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                2
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                3
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- end of pagination -->
            </div>

            <!-- TABLE 2 -->
            <div class="col-xl-6 col-12">
                <h3 class="text-muted text-center">Recent Payments</h3>
                <table class="table table-dark table-hover text-center">
                    <thead>
                    <tr class="text-muted">
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>Numan</td>
                        <td>$2000</td>
                        <td>14/08/2019</td>
                        <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Idrees</td>
                        <td>$4000</td>
                        <td>1/12/2019</td>
                        <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Arshad</td>
                        <td>$20000</td>
                        <td>10/08/2019</td>
                        <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Akmal</td>
                        <td>$4500</td>
                        <td>14/09/2019</td>
                        <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Zahid</td>
                        <td>$1800</td>
                        <td>05/08/2019</td>
                        <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>Idrees</td>
                        <td>$1800</td>
                        <td>05/08/2019</td>
                        <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                    </tr>
                    </tbody>
                </table>

                <!-- Paginaton -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link py-2 px-3">
                                1
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                2
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                3
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link py-2 px-3">
                                <span>Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- end of pagination -->
            </div>
        </div>

    </section>
    <!--  end of table  -->

@endsection
