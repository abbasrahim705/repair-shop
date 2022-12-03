@include("clients.header")

<body>


        @include('components.profile')
		@include('layouts.sidbar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-table mtext"></i>Service Name</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="clientdashboard">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Services</li>
								</ol>
							</nav>
						</div>
						<!-- <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_item">
									Add New
								</a>
							</div>
						</div> -->
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Services List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Service Name</th>
									{{-- <th>Category</th> --}}
									{{-- <th>Image</th> --}}
									<th>Description</th>
									{{-- <th>Serial No.</th> --}}
									<th>Amount</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        {{-- <td>Category 01</td> --}}
                                        {{-- <td>No Image</td> --}}
                                        <td>{{ $service->description }}</td>
                                        {{-- <td>No Serail No#</td> --}}
                                        <td>{{ $service->amount }}</td>
                                        <td>
                                            <form action="{{ route('get-serivce',$service->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-success" type="submit">
                                                    Get
                                                </button>
                                            </form>
                                         </td>
                                    </tr>
                                @endforeach


							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	<!-- Add Technician Modal -->
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Item</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Item name</label>
																<input class="form-control form-control-lg" type="text">
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
															<div class="form-group">
																<label>Category</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
																	<option>Category 1</option>
																	<option>Category 2</option>
																	<option>Category 3</option>
																</select>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<textarea class="form-control form-control-lg"></textarea>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Serial No.</label>
																<input class="form-control form-control-lg" type="text">
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Amount</label>
																<input class="form-control form-control-lg" type="text">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>image</label>
																<input class="form-control form-control-lg" type="file">
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
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
