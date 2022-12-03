@include("layouts.header")
<body>


        @include('components.profile')
		@include('layouts.sidbar')
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-user mtext"></i> Work Orders</h4>
							</div>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (session()->has('failed'))
                                <div class="alert alert-danger">
                                    {{ Session::get('failed') }}
                                </div>
                            @endif
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Work Orders</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Work Orders List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>

								<tr>
									<th>#ID</th>
									<th>Service Name</th>
									{{-- <th>Description</th> --}}
                                    <th>Amount</th>
									<th>Order Date</th>
                                    <th>Assigned To</th>
									<th>Order Status</th>
                                    <th>Payment Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                {{-- @dd($orders) --}}
								@foreach($orders as $order)
                                @isset($order->services->name)
                                <tr>
									{{-- <td>
									<img src="/images/{{ $Customer->image }}" width="70px">

									</td> --}}
									<!-- <td><img src="src/images/admin.png" width="50" style="border: 1px solid gray"></td> -->
									<td>{{ $order->id }}</td>
									    <td>{{ ucwords($order->services->name)}}</td>
                                        {{-- <td>{{ $order->services->description }}</td> --}}
                                        <td> @money($order->services->amount)</td>
									<td>{{ $order->created_at->diffForHumans() }} </td>
                                    @if (auth()->user()->role == 1 )
                                        <td>
                                            @if ( $order->work_status == 'pending')
                                            <form action="{{ route('assignTo',$order->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <select name="assigned_to" id="" onchange="this.form.submit()">
                                                    <option value="">Choose Technician</option>
                                                    @foreach ($technicians as $technician)
                                                        <option value="{{ $technician->id }}" {{ $technician->id == $order->assigned_to ? 'selected' : '' }}>{{ $technician->name }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                            @else
                                            {{ $order->technicians->name }}
                                            @endif
                                        </td>
                                    @elseif (auth()->user()->role == 3 && ($order->work_status == 'completed' || $order->assigned_to != null))
                                                <td>{{ $order->technicians->name }}</td>
                                                @else
                                                <td>Not Assigned</td>
                                    @endif
                                    <td>
                                        @if ($order->work_status == 'pending')
                                         <button class="btn btn-warning">Pending</button>
                                        @elseif ($order->work_status == 'completed')
                                         <button class="btn btn-success">Completed</button>
                                        @endif
                                    </td>
									<td>
                                        @if ($order->payment_status == 'pending')
									        <button class="btn btn-danger">Due</button>
									    @elseif ($order->payment_status == 'paid')
									        <button class="btn btn-success">Paid</button>
       								    @endif
									</td>
                                    {{-- @if ($order->work_status == 'pending' && $order->payment_status == 'pending') --}}
                                    <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												{{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#view"><i class="dw dw-eye"></i>Update Work</a> --}}
                                               @if (auth()->user()->role == 1)
                                                    <form action="{{ route('process-work',$order->id) }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="dropdown-item" type="submit" {{ $order->work_status == 'completed' ? 'disabled' : '' }}><i class="dw dw-edit2"></i> Process Order</button>
                                                   </form>
                                                <a class="dropdown-item" href=""><i class="dw dw-delete-3"></i> Delete</a>
                                               @elseif (auth()->user()->role == 3)
                                               <form action="{{ route('pay-fee',$order->id) }}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <button class="dropdown-item" type="submit" {{ $order->payment_status == 'paid'? 'disabled': '' }}><i class="dw dw-edit2"></i> Pay Fee</button>
                                            </form>
                                               @endif
											</div>
										</div>
									</td>
                                    {{-- @else --}}

                                    {{-- @endif --}}

								</tr>
                                @endisset

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
				<!-- Simple Datatable End -->

					{{-- <input class="form-control form-control-lg" type="text" value="active"> --}}

							<!-- Delete modal -->
					<div class="col-md-4 col-sm-12 mb-30">
							<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content bg-danger text-white">
										<div class="modal-body text-center">
											<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
											<p>Are you sure you want to delete this Client?</p>
											<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
											<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
					</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>
