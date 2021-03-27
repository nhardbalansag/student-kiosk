@extends('home')
@section('home-contents')
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
            <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="border-0 card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Online Store Visitors</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                    <span class="text-lg text-bold">820</span>
                                    <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto text-right d-flex flex-column">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="mb-4 position-relative">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="flex-row d-flex justify-content-end">
                                    <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Year
                                    </span>

                                    <span>
                                    <i class="fas fa-square text-gray"></i> Last Year
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="border-0 card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Sales</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-lg text-bold">$18,230.00</span>
                                        <span>Sales Over Time</span>
                                    </p>
                                    <p class="ml-auto text-right d-flex flex-column">
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 33.1%
                                        </span>
                                        <span class="text-muted">Since last month</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="mb-4 position-relative">
                                    <canvas id="sales-chart" height="200"></canvas>
                                </div>

                                <div class="flex-row d-flex justify-content-end">
                                    <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This year
                                    </span>

                                    <span>
                                    <i class="fas fa-square text-gray"></i> Last year
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
      <!-- /.content -->
    </div>
@endsection
