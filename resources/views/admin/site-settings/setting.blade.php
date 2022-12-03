@include("layouts.header")

<body>
    @include('components.profile')
    @include("layouts.sidbar")
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4><i class="micon dw dw-settings2 mtext"></i> Settings</h4>
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                 </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                        <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Change Settings</h4>
                    </div>
                    <div class="pb-20">
                        <div class="pd-20 ">
                            <form action="{{ route('update-setting') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" type="text" value="@isset($setting->shop_name)
                                                {{ $setting->shop_name }}
                                                @endisset" placeholder="Enter Shop Name">
                                                @error('shop_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                            <label>Owner Name</label>
                                                <input class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" type="text" value="@isset($setting->owner_name)
                                                    {{ $setting->owner_name }}
                                                @endisset" placeholder="Enter Owner Name">
                                                @error('owner_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Shop Logo</label>
                                                    <input class="form-control @error('logo') is-invalid @enderror" name="logo" type="file" value="@isset($setting->logo)
                                                    {{ $setting->logo }}
                                                @endisset" placeholder="Upload Shop Logo">
                                                @error('logo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                @isset($setting->logo)
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Logo Display</label>
                                                    <img src="@isset($setting->logo)
                                                        Storage::url($setting->logo)
                                                    @endisset" alt="Shop Logo" width="100px" height="100px">
                                                    </div>
                                                </div>
                                                @endisset
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Shop Slogan</label>
                                                    <input class="form-control @error('shop_slogan') is-invalid @enderror" name="shop_slogan" type="text" value="@isset($setting->shop_slogan)
                                                    {{ $setting->shop_slogan }}
                                                @endisset" placeholder="Enter Slogan">
                                                @error('shop_slogan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" value="@isset($setting->address)
                                                    {{ $setting->address }}
                                                @endisset" placeholder="Enter Shop Physical Address">
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="@isset($setting->email)
                                                    {{ $setting->email }}
                                                @endisset" placeholder="Enter Email Address">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Contact</label>
                                                    <input class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" type="text" value="@isset($setting->contact_no)
                                                    {{ $setting->contact_no }}
                                                @endisset" placeholder="Enter Contact number">
                                                @error('contact_no')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Website</label>
                                                    <input class="form-control @error('web_address') is-invalid @enderror" name="web_address" type="text" value="@isset($setting->web_address)
                                                    {{ $setting->web_address }}
                                                @endisset" placeholder="www.website.com">
                                                @error('web_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input class="form-control @error('facebook') is-invalid @enderror" name="facebook" type="text" value="@isset($setting->facebook)
                                                    {{ $setting->facebook }}
                                                @endisset" placeholder="Enter Facebook URL">
                                                @error('facebook')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Whatsapp</label>
                                                    <input class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" type="text" value="@isset($setting->whatsapp)
                                                    {{ $setting->whatsapp }}
                                                @endisset" placeholder="Enter Whatsapp Number">
                                                @error('whatsapp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Youtube</label>
                                                    <input class="form-control @error('youtube') is-invalid @enderror" name="youtube" type="text" value="@isset($setting->youtube)
                                                    {{ $setting->youtube }}
                                                @endisset" placeholder="Enter Youtube URL">
                                                @error('youtube')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Tik Tok</label>
                                                    <input class="form-control @error('tiktok') is-invalid @enderror" name="tiktok" type="text" value="@isset($setting->tiktok)
                                                    {{ $setting->tiktok }}
                                                @endisset" placeholder="Enter Tik Tok URL">
                                                @error('tiktok')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>LinkedIn</label>
                                                    <input class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" type="text" value="@isset($setting->linkedin)
                                                    {{ $setting->linkedin }}
                                                @endisset" placeholder="Enter LinkedIn URL">
                                                @error('linkedin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                    <label>Instagram</label>
                                                    <input class="form-control @error('instagram') is-invalid @enderror" name="instagram" type="text" value="@isset($setting->instagram)
                                                    {{ $setting->instagram }}
                                                @endisset" placeholder="Enter Instagram URL">
                                                @error('instagram')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary"  type="submit"> Save Changes </button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            </div>
                        </div>
                        <!-- Simple Datatable End -->
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

