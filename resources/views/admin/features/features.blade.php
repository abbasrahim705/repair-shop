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
								<h4><i class="micon dw dw-table mtext"></i> Features</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Features</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
                                <a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_feature">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Features List</h4>
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
                                    <th>Name</th>
									<th>Title</th>
									<th>Description</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($features as $feature)
								<tr>
								<td><img src="/images/item/{{ $feature->image }}" width="70px"></td>
									<td>{{ $feature->name }}</td>
                                    <td>{{ $feature->title }}</td>
									<td>{{ $feature->description}}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{ route('editing-feature',$feature->id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{ route('deleting-feature',$feature->id) }}" onclick="confirm('Do You Want to Delete?')"><i class="dw dw-delete-3"></i>Delete</a>
											</div>
										</div>
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
        <div class="modal fade" id="add_feature" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class=" border-radius-10">
                        <div class="login-title"><br>
                            <div class="col-md-12 col-sm-12 mb-30">
                            <h2 class="text-center text-primary">Adding Feature</h2>
                            </div>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('adding-feature') }}">
                            @csrf
                            <div class="input-group custom">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Feature Name</label>
                                    <input class="form-control form-control-lg" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Feature Title</label>
                                    <input class="form-control form-control-lg" type="text" name="title">
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
                                    <label>image</label>
                                    <input class="form-control form-control-lg" type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    {{-- <input  class="btn btn-danger" value="Cancel"> --}}
                                    <button type="button" class="btn btn-danger" onclick="close()">Cancel</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function close(){
            alert('close');
        }
    </script>
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
