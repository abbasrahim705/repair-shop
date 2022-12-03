@include("layouts.header")
<body>


    @include('components.profile')
		@include("layouts.sidbar")
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-user mtext"></i> Clients</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Clients</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Clients List</h4>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>

								<tr>
									<th>Image</th>
									<th>#ID</th>
									<th>Full Name</th>
									<th>Address</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Status</th>
									{{-- <th class="datatable-nosort">Action</th> --}}
								</tr>
							</thead>
							<tbody>
								@foreach($clientsall as $Customer)
								<tr>
									<td>
									<img src="{{ storage_path($Customer->image) }}" width="70px">
                                    {{-- <img src="{{ url('/') }}/storage\app\public\images\72D1eQXY3J7ol9vf4T7w4P8NiyzP3c8tQteEH0lz.jpg" alt=""> --}}
									</td>
									<!-- <td><img src="src/images/admin.png" width="50" style="border: 1px solid gray"></td> -->
									<td>{{ $Customer->id }}</td>
									<td>{{ ucwords($Customer->name)}}</td>
									<td>{{ $Customer->address }} </td>
									<td>{{ $Customer->phone }}</td>
									<td>{{ $Customer->email }}</td>
									<td>@if ($Customer->status==1)
									<button class="btn btn-success">Active</button>

									@else
									<button class="btn btn-danger">inactive</button>

       								 @endif
										</td>
									{{-- <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#view"><i class="dw dw-eye"></i>Update Work</a>
												<a class="dropdown-item" href="edid-client/{{ $Customer->id }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delete-client/{{ $Customer->id }}"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td> --}}
								</tr>
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
