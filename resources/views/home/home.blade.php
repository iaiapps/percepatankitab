@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="mb-2 f-w-400 ">Selamat Datang di Aplikasi Manajemen Percepatan Baca Kitab</h4>

        </div>
    </div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total User</h6>
                    <h4 class="mb-3">4,42,236 </h4>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Pembayaran</h6>
                    <h4 class="mb-3">4,42,236 </h4>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Kelas</h6>
                    <h4 class="mb-3">4,42,236 </h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-2 f-w-400 text-muted">Total Modul</h6>
                    <h4 class="mb-3">4,42,236 </h4>

                </div>
            </div>
        </div>


        <div class="col-md-12 col-xl-8">
            <h5 class="mb-3">Recent Orders</h5>
            <div class="card tbl-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>TRACKING NO.</th>
                                    <th>PRODUCT NAME</th>
                                    <th>TOTAL ORDER</th>
                                    <th>STATUS</th>
                                    <th class="text-end">TOTAL AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Camera Lens</td>
                                    <td>40</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-danger f-10 m-r-5"></i>Rejected</span>
                                    </td>
                                    <td class="text-end">$40,570</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Laptop</td>
                                    <td>300</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-warning f-10 m-r-5"></i>Pending</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="text-muted">84564564</a></td>
                                    <td>Mobile</td>
                                    <td>355</td>
                                    <td><span class="d-flex align-items-center gap-2"><i
                                                class="fas fa-circle text-success f-10 m-r-5"></i>Approved</span>
                                    </td>
                                    <td class="text-end">$180,139</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <h5 class="mb-3">Analytics Report</h5>
            <div class="card">
                <div class="list-group list-group-flush">
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
                        Finance Growth<span class="h5 mb-0">+45.14%</span></a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Company
                        Expenses Ratio<span class="h5 mb-0">0.58%</span></a>
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">Business
                        Risk Cases<span class="h5 mb-0">Low</span></a>
                </div>
                <div class="card-body px-2">
                    <div id="analytics-report-chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
