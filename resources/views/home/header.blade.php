<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insaf Repair Shop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.8.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">@isset($setting->shop_name)
        {{ $setting->shop_name }}
        @else
        Shop
      @endisset</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : ''}}">Home</a></li>
          <li><a href="{{ route('services') }}" class="{{ request()->is('/Services-index') ? 'active' : ''}}">Services</a></li>
          <li><a href="{{ route("portfolio") }}" class="{{ request()->is('/Portfolio-index') ? 'active' : '' }}">Portfolio</a></li>
          <li><a href="{{ route("contact") }}" class="{{ request()->is('/Contact-index') ? 'active' : ''}}">Contact</a></li>
          @guest
          <li><a href="/login" type="submit" class="getstarted btn btn-outline-success">Login</a>
            <li><a href="/register" class="getstarted">SignUp</a>
                @else
                <li class="dropdown">
                    <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route('admin-dashboard') }}">Dashboard <i class="bi bi-speedometer"></i></a></li>
                      <li><a class="dropdown-item" href="#">Profile <i class="bi bi-person-circle"></i></a></li><hr>
                      <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"> Log Out <i class="bi bi-box-arrow-right"></i></a>
                        </form>
                        {{-- <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Log Out</a> --}}
                      </li>
                    </ul>
                </li>
                {{-- <li class="" style="margin-left: 20px">Welcome &#128519 {{ auth()->user()->name }}</li> --}}
          @endguest

        </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
