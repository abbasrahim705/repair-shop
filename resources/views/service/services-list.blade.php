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
								<h4><i class="micon dw dw-car mtext"></i> Services</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Services</li>
								</ol>
							</nav>
						</div>
                        @if (auth()->user()->role == 1)
                        <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
                                <a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_service">
									Add New
								</a>
							</div>
						</div>
                        @endif

					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Services List</h4>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
					</div>
					<div class="pb-20">
                        @if (auth()->user()->role == 1)
                        <table class="data-table table responsive">
							<thead>
								<tr>
									<th>Service Name</th>
									<th>Desccription</th>
									<th>Amount</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($services as $servic)
								<tr>
									<td>{{ $servic->name }}</td>
									<td>{{ $servic->description }}</td>
									<td><span class="badge bg-warning">{{ $servic->amount }}</span></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="{{ route('edit_service',$servic->id) }}" class="dropdown-item"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{ route('delete_service',$servic->id) }}" onclick="confirm('Do you want to delete?')"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
                        @elseif (auth()->user()->role == 3)
                        <table class="data-table table responsive">
							<thead>
								<tr>
									<th>Service Name</th>
									<th>Desccription</th>
									<th>Amount</th>
                                    <th>Action</th>
									{{-- <th class="datatable-nosort">Action</th> --}}
								</tr>
							</thead>
							<tbody>
								@foreach($services as $servic)
								<tr>
									<td>{{ $servic->name }}</td>
									<td>{{ $servic->description }}</td>
									<td><span class="badge bg-warning">@money($servic->amount)</span></td>
									{{-- <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="{{ route('edit_service',$servic->id) }}" class="dropdown-item"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{ route('delete_service',$servic->id) }}" onclick="confirm('Do you want to delete?')"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td> --}}
                                    <td>
                                        <form action="{{ route('get-serivce',$servic->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-success" type="submit">Get</button>
                                        </form>
                                    </td>
								</tr>
								@endforeach
							</tbody>
						</table>
                        @endif

					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	<!-- Add Service Modal -->
					 <div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Services</h2>
												</div>
											<form method="POST" action="{{ route("adding-service") }}">
                                                @csrf
												<div class="input-group custom">
                                                    <input type="hidden" name="id" id="id">
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Service Name</label>
																<input class="form-control form-control-lg" type="text" name="name">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<textarea class="form-control form-control-lg" name="description"></textarea>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Amount</label>
																<input class="form-control form-control-lg" type="number" name="amount">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<input type="submit" class="btn btn-primary" value="Submit">
														<button type="submit" class="btn btn-danger" onclick="document.getElementByClass('modal').style.display='none'">Close</button>
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
											<p>Are you sure you want to delete this Services?</p>
											<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
											<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
					</div>
	<!-- js -->
    {{-- <script>
        function edit(id){
            let document.getElementById('id').value = id;
        }
    </script> --}}


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
