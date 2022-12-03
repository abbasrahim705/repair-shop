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
                        <h4 class="card-title mt-3 text-center">Updating Account</h4>
                        <p class="text-center">Updating Technician Account</p>
                        @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{ session("success")}}
                        </div>
                        @endif

                      <form action="{{ url('update-tech')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" value="{{ $technicians->id }}" name="technicians_id">

                          <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="name" class="form-control" placeholder="Full name" type="text" value="{{ $technicians->name }}">
                                @error('name') <span class="text-danger">{{$message}}</span>@enderror

                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="email" class="form-control" placeholder="Email address" type="email" value="{{ $technicians->email }}">
                                @error('email') <span class="text-danger">{{$message}}</span>@enderror

                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="phone" class="form-control" placeholder="Phone number" type="number" value="{{ $technicians->phone }}">
                                @error('phone') <span class="text-danger">{{$message}}</span>@enderror

                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                </div>
                                <select class="form-control" name="status" value="{{ $technicians->status }}">

                                    <option> Select Your Status</option>
                                    <option value="1" {{ $technicians->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $technicians->status == 0 ? 'selected' : '' }}>inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span>@enderror

                            </div>
                                <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="address" class="form-control" placeholder="Enter Your Address" type="text-area" value="{{ $technicians->address }}">
                                @error('address') <span class="text-danger">{{$message}}</span>@enderror

                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Image
                                </div>
                                <input name="image" class="form-control" placeholder="place image" type="file" value="{{ $technicians->address }}">
                                    <br>
                                    <img src="/images/{{ $technicians->image }}" width="100px">
                                    @error('image') <span class="text-danger">{{$message}}</span>@enderror

                                </div>
                            </div>
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
