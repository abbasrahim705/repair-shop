
@include("layouts.header")
<body>

        @include('components.profile')
        @include("layouts.sidbar")
        @if (auth()->user()->role == 1)
        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">

                <div class="title pb-20">
                    <h2 class="h3 mb-0">Dashboard</h2>
                </div>
                <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20"><a href="/" class="btn btn-primary">GO Home</a><br></div>
                </div>
                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $orders->count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Work Order</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-tasks"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $users }}</div>
                                    <div class="font-14 text-secondary weight-500">Client</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b"><span class="micon fa fa-users"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{$technicians}}</div>
                                    <div class="font-14 text-secondary weight-500">Technician</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#2c515b"><span class="micon fa fa-wrench"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">@money( $earnings )</div>
                                    <div class="font-14 text-secondary weight-500">Earning</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif (auth()->user()->role == 3)
        {{-- @include('clients.header') --}}
        <div class="main-container">
            <div class="xs-pd-20-10 pd-ltr-20">

                <div class="title pb-20">
                    <h2 class="h3 mb-0">Dashboard</h2>
                    </div>
                <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20"><a href="/" class="btn btn-primary">GO Home</a><br></div>
                </div>

                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $client_order->count() }}</div>
                                    <div class="font-14 text-secondary weight-500">My Work Orders</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-tasks"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $client_item->count() }}</div>
                                    <div class="font-14 text-secondary weight-500">My Items</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-tasks"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $services->count() }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Services</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#ff5b5b"><span class="micon fa fa-users"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                        <div class="card-box height-100-p widget-style3">
                            <div class="d-flex flex-wrap">
                                <div class="widget-data">
                                    <div class="weight-700 font-24 text-dark">{{ $users }}</div>
                                    <div class="font-14 text-secondary weight-500">Total Users</div>
                                </div>
                                <div class="widget-icon">
                                    <div class="icon" data-color="#2c515b"><span class="micon fa fa-wrench"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
	{{-- <div class="mobile-menu-overlay"></div> --}}


	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>
</body>
