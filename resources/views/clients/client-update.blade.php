@extends('layouts.layout')

@section('content')

<div class="register-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <!-- <div class="card-header mt-3 text-center">REGISTRATION FORM</div> -->
                  <div class="card-body">
                  <div class="card bg-light">
                    <!-- <article class="card-body mx-auto" style="max-width: 400px;"> -->
                        <h4 class="card-title mt-3 text-center">Update Account</h4>
                        <p class="text-center">Making changes to account</p>
                        @if(session()->has("success"))
                            <div class="alert alert-success">
                                {{ session("success")}}
                            </div>
                            @endif

                            <form action="/update-client" method="POST" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" value="{{ $client->id }}" name="id">
                            <input type="hidden" value="{{ $client->role }}" name="role">


                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="name" class="form-control" placeholder="Full name" type="text" value="{{ $client->name }}">
                                    @error('name') <span class="text-danger">{{$message}}</span>@enderror

                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="email" class="form-control" placeholder="Email address" type="email" value="{{ $client->email }}">
                                    @error('email') <span class="text-danger">{{$message}}</span>@enderror

                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input name="phone" class="form-control" placeholder="Phone number" type="text" value="{{ $client->phone }}">
                                    @error('phone') <span class="text-danger">{{$message}}</span>@enderror

                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select class="form-control" name="status" >
                                        <option> Select Your Status</option>
                                            <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div> <!--form-group end.// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Create password" type="password" name="password" value="{{ $client->password }}">
                                    @error('password') <span class="text-danger">{{$message}}</span>@enderror

                                </div> <!-- form-group// -->
                               <!-- form-group end.// -->
                                    <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="address" class="form-control" placeholder="Enter Your Address" type="text-area" value="{{ $client->address }}">
                                    @error('address') <span class="text-danger">{{$message}}</span>@enderror

                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="image" class="form-control" placeholder="place image" type="file" value="{{ $client->address }}">
                                    <br>
                                    <img src="/images/{{ $client->image }}" width="100px">
                                    @error('image') <span class="text-danger">{{$message}}</span>@enderror

                                </div>  <!-- form-group// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Update Account  </button>
                                </div> <!-- form-group// -->
                                {{-- <p class="text-center">Have an account? <a href="login">Log In</a> </p> --}}
                            </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
