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
								<h4><i class="micon dw dw-hammer mtext"></i> Technicians</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Technicians</li>
								</ol>
							</nav>
						</div>
						{{-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="technician-form" class="btn btn-primary" >
									Add New
								</a>
							</div>
						</div> --}}
                        <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Technicians List</h4>
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
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Image</th>
									<th>ID</th>
									{{-- <th>T--Code</th> --}}
									<!-- <th>Profile</th> -->
									<th>Full Name</th>
									<th>Email</th>
									<th>Contact</th>
									{{-- <th>Experience</th> --}}
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($technicianall as $tech)
								<tr>
									<td><img src="src/images/admin.png" width="70px"></td>
									<td>{{ $tech->id}}</td>
									{{-- <td>{{ $tech->registration}}</td> --}}
									<!-- <td><img src="src/images/admin.png" width="50" style="border: 1px solid gray"></td> -->
									<td>{{ ucwords($tech->name)}}</td>
									<td>{{$tech->email}}</td>
									<td>{{$tech->phone}}</td>
									{{-- <td>{{ $tech->experience }}</td> --}}

									<td>@if ($tech->status==1)
									<button class="btn btn-success">Active</button>

									@else
									<button class="btn btn-danger">inactive</button>

       								 @endif</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												{{-- <a href="#" class="dropdown-item" data-backdrop="static" data-toggle="modal" data-target="#edit_technician"><i class="dw dw-edit2"></i> Edit</a> --}}
                                                <a class="dropdown-item" href="edid-tech/{{ $tech->id}}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delete-tech/{{ $tech->id }}" onclick="confirm('Do You Want to Delete?')"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
	<!-- Add Technician Modal -->
    <div class="col-md-12 col-sm-12 mb-30">
        <div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class=" border-radius-10">
                        <div class="login-title"><br>
                            <div class="col-md-12 col-sm-12 mb-30">
                            <h2 class="text-center text-primary">Adding Technician</h2>
                            </div>
                        <form method="post" enctype="multipart/form-data" action="{{ route('adding-tech') }}">
                            @csrf
                            <div class="input-group custom">
                            {{-- <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Technician Code</label>
                                    <input class="form-control form-control-lg" name="" type="text">
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Technician Name</label>
                                    <input class="form-control form-control-lg" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" name="email" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input class="form-control form-control-lg" name="phone" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control form-control-lg">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    {{-- <input class="form-control form-control-lg" name="status" type="text"> --}}
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control form-control-lg" name="address" type="text">
                                </div>
                            </div>

                            {{-- <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" name="" type="password">
                                </div>
                            </div> --}}
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Profile</label>
                                    <input class="form-control form-control-lg" name="image" type="file">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <input type="submit" class="btn btn-danger" value="Cancel">
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete modal -->
    <div class="col-md-4 col-sm-12 mb-30">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-body text-center">
                        <h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
                        <p>Are you sure you want to delete this Technician?</p>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
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
