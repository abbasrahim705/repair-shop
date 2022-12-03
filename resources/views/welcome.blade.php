

    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>To Entering Dashboard</h2>
  <br>
  <br><br>
        <table>
            <th>
            <div class="col-md-12 text-center">
        @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-info">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-info"> User Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-info">User Register</a>
                        @endif
                    @endauth
                </div>
            @endif</th>
            <th>
                @auth('admin')
                   <a href="{{ route('admin.dashboard') }}" class="btn btn-info"> Admin dashboard</a>
                   @else
                   <a href="{{ route('admin.login') }}" class="btn btn-info"> Admin login</a>
                   @endauth

  </th>
  </div>
        </table>
    </div>
  </div>
</div>




</div>

</body>
</html>

