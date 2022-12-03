<!-- ======= Footer ======= -->
{{-- <footer id="footer">
      </div>
      <div class="row">
        <div class="col-md-4">
            <h3>{{ $setting->shop_name }}</h3>
            <p>{{ $setting->shop_slogan }}</p>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4"></div>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Registerd by <a href="https://bootstrapmade.com/">Pakistan Automobiles Regulatory Authority (PARA)</a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}
  <footer class="footer-48201 bg-dark text-white p-5">

    <div class="container">
      <div class="row">
        <div class="col-md-4 pr-md-5">
          <a href="#" class="footer-site-logo d-block mb-4 display-5">@isset($setting->shop_name)
            {{ $setting->shop_name }}
            @else
            Shop
          @endisset</a>
          <p>@isset($setting->shop_slogan)
            {{ $setting->shop_slogan }}
            @else
            We are Expert
          @endisset</p>
        </div>
        <div class="col-md">
          <ul class="list-unstyled nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
        <div class="col-md">
          <ul class="list-unstyled nav-links">
            <li><a href="#">Clients</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Journal</a></li>
          </ul>
        </div>
        <div class="col-md">
          <ul class="list-unstyled nav-links">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Partners</a></li>
          </ul>
        </div>
        <div class="col-md text-md-center">
          <ul class="social list-unstyled">
            <li><a href="@isset($setting->instagram)
                {{ $setting->instagram }}
            @endisset"><i class="bi bi-instagram"></i></a></li>
            <li><a href="@isset($setting->linkedin)
                {{ $setting->linkedin }}
            @endisset"><i class="bi bi-linkedin"></i></a></li>
            <li><a href="@isset($setting->facebook)
                {{ $setting->facebook }}
            @endisset"><i class="bi bi-facebook"></i></a></li>
            <li><a href="@isset($setting->tiktok)
                {{ $setting->tiktok }}
            @endisset"><i class="bi bi-tiktok"></i></a></li>
            <li><a href="@isset($setting->youtube)
                {{ $setting->youtube }}
            @endisset"><i class="bi bi-youtube"></i></a></li>
          </ul>
          <p class=""><a href="#" class="btn btn-tertiary">Contact Us</a></p>
        </div>
      </div>

      <div class="row ">
        <div class="col-12 text-center">
          <div class="copyright mt-5 pt-5">
            Registerd by <a href="#">Pakistan Automobiles Regulatory Authority (PARA)</a>
            <p><small>&copy; 2019-2022 All Rights Reserved.</small></p>

          </div>
        </div>
      </div>
    </div>

  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
