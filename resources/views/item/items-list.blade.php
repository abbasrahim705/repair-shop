@include("layouts.header")

<body>
	{{-- <div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="src/images/admin.png" width="50">
						</span>
						<span class="user-name">{{ auth()->user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
						<hr>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

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
								<h4><i class="micon dw dw-table mtext"></i> Items</h4>
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Items</li>
								</ol>
							</nav>
						</div>
                        @if (auth()->user()->role == 1)
                        <div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
                                <a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_item">
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
						<h4 class="text-blue h4">Items List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Image </th>
									<th>Name</th>
									<th>Category</th>
									<th>Description</th>
									<th>Serial No.</th>
									<th>Amount</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $thing)
								<tr>
								<td><img src="/images/item/{{ $thing->image }}" width="70px"></td>
									<td>{{ $thing->name }}</td>
                                    <td>{{ $thing->category->name }}</td>
									<td>{{ $thing->description}}</td>
									<td>{{ $thing->serial_no }}</td>
									<td><span class="badge bg-warning">{{ $thing->amount }}</span></td>
									<td>
                                        @if (auth()->user()->role == 3)
                                        <form action="{{ route('get-item',$thing->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-success" type="submit">Get</button>
                                        </form>
                                        @elseif(auth()->user()->role == 1)
                                        <div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a href="{{ route('edit-item',$thing->id) }}" class="dropdown-item"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{ route('delete-item',$thing->id) }}" onclick="confirm('Do you want to delete?')"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
                                        @endif

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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('adding-item') }}">
                            @csrf
                            <div class="input-group custom">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                            <label>Item name</label>
                                            <input class="form-control form-control-lg" type="text" name="name">
                                        </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control form-control-lg" name="description"></textarea>
                                        </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                            <label>Serial No.</label>
                                            <input class="form-control form-control-lg" type="text" name="serial_no">
                                        </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control form-control-lg" type="text" name="amount">
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
