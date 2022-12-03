<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Stacked form</h2>
  <form action="{{ url('send-all')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
      @error('name') <span class="text-danger">{{$message}}</span>@enderror
    </div>
    <div class="form-group">
      <label for="">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
      @error('email') <span class="text-danger">{{$message}}</span>@enderror

    </div>
    <div class="form-group">
      <label for="">Subject:</label>
      <input type="text" class="form-control"  placeholder="Enter subject" name="subject" value="{{ old('subject') }}">
      @error('subject') <span class="text-danger">{{$message}}</span>@enderror

    </div>
    <div class="form-group">
      <label for="">message:</label>
      <textarea class="form-control" id="message" placeholder="Enter message" name="message" cols="4" rows="4">{{ old('message')}}</textarea>
      @error('message') <span class="text-danger">{{$message}}</span>@enderror
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
