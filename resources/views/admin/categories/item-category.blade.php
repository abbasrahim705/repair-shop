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
								<h4><i class="micon dw dw-file mtext"></i> Items Category</h4>
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Item Category</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Category List</h4>
					</div>

					<div class="pb-20">
						<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="pd-20 ">
								<form action="{{ route('adding-category') }}" method="post">
                                    @csrf
									<div class="form-group">
										<label>Category Name</label>
										<input class="form-control" type="text" placeholder="input category name" name="name">
									</div>
									<div class="form-group">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
								</form>
                                @if (session()->has('success'))
                                    <div class="valid-feedback">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
							</div>
						</div>
						<div class="col-md-8 col-sm-12">
							<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Category Name</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                {{-- @dd($categories) --}}
                                @foreach ($categories as $category)
                                <tr>
									<td>{{ $category->name }}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{ route('edit-category',$category->id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{ route('delete_category',$category->id) }}" onclick="confirm('Do you want to delete?')"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
                                @if (Session::has('success'))
                                    <div class="valid-feedback">
                                        {{ Session::get('success')}}
                                    </div>
                                @endif
                                @endforeach

							</tbody>
						</table>
						</div>
					</div>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
							<!-- Delete modal -->
					<div class="col-md-4 col-sm-12 mb-30">
							<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content bg-danger text-white">
										<div class="modal-body text-center">
											<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
											<p>Are you sure you want to delete this category?</p>
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
