
<!DOCTYPE html>
<html lang="en">
<head>
  <title>IRS | Adding Item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Adding Item</h2>
        <div class="panel panel-default">
            <div class="panel-heading">Adding Item</div>
                <div class="panel-body">
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
                    @endif
                    <form action="{{ url('add-item')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" >
                                <label>Item Name</label>
                                <input name="name" class="form-control form-control-lg" type="text">
                                    @error('name') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Serial No.</label>
                                <input name="serial_no" class="form-control form-control-lg" type="text">
                                    @error('serial_no') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control form-control-lg"></textarea>
                                    @error('description') <span class="text-danger">{{$message}}</span>@enderror

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="amount" class="form-control form-control-lg" type="text">
                                    @error('amount') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>image</label>
                                <input name="image" class="form-control form-control-lg" type="file">
                                    @error('image') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" >
                                <label>Category</label>
                                <select  class="form-control form-control-lg" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-30">
                            <input type="submit" class="btn btn-primary " value="Submit">
                            <input type="reset" class="btn btn-danger" value="Cancel">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>

