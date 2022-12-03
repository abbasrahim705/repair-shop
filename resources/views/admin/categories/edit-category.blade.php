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
                        <h4 class="card-title mt-3 text-center">Updating Category</h4>
                        <p class="text-center">Updating Category</p>
                        @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{ session("success")}}
                        </div>
                        @endif

                      <form action="{{ route('updating-category') }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="id" id="id" value="{{ $category->id }}">
                          <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="name" class="form-control" placeholder="Service Name" type="text" value="{{ $category->name }}">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Update Data </button>
                            </div>
                        </form>
                  </div>
              </div>
          </div>
      </div>

  </div>
</div>
