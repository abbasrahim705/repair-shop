@include("home.header")

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="Home-index">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div>
          <iframe style="border:0; width: 100%; height: 270px;"  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6615.055219127374!2d71.50380121427902!3d34.00466554433091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1667814148926!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>@isset($setting->address)
                    {{ $setting->address }}
                    @else
                    Peshawar Pakistan
                @endisset</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                @isset($setting->email)
                    <p><a href="mailto:{{ $setting->email }}" class="text-muted">{{ $setting->email }}
                    </a></p>
                @else
                <p><a href="" class="text-muted">shop@gmail.com
                </a></p>
                @endisset

              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                @isset($setting->contact_no)
                <p><a href="tel:{{ $setting->contact_no }}" class="text-muted">{{ $setting->contact_no }}</a></p>
                @else
                <p><a href="" class="text-muted">032165894</a></p>
                @endisset
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
          @if(session()->has("success"))
<div class="alert alert-success">
    {{ session("success")}}
</div>
@endif

@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif


          <form action="{{ url('send-all')}}" method="POST" role="form" >
            @csrf
              <div class="row">
                @auth
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required value="{{ old('name',auth()->user()->exists ? auth()->user()->name : '') }}">
                    @error('name') <span class="text-danger">{{$message}}</span>@enderror
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="{{ old('email',auth()->user()->exists ? auth()->user()->email : '') }}">
                      @error('email') <span class="text-danger">{{$message}}</span>@enderror
                  </div>
                @else
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required value="{{ old('name') }}">
                  @error('name') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="{{ old('email') }}">
                    @error('email') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                @endauth


              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required value="{{ old('subject') }}">
                @error('subject') <span class="text-danger">{{$message}}</span>@enderror

              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required value="{{ old('message') }}"></textarea>
                 @error('message') <span class="text-danger">{{$message}}</span>@enderror

              <!-- </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"> msg sent</div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <br>
              <div class="text-center"><button type="submit" class="btn btn-info">Send Message</button></div>
            </form>


        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@include("home.footer")
