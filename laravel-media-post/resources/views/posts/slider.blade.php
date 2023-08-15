<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Media Post</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container">

    <div style="margin-bottom:20px;">
    <h3 style="text-align:center; margin:50px;">Update Slider Delay Time</h3>
    <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data"> Back</a>
    </div>

	   
	  @if(session('status'))
	    <div class="alert alert-success mb-1 mt-1">
	        {{ session('status') }}
	    </div>
	  @endif
  
		<form method="POST"  action="{{ url('/slider-update') }}" >
    	@csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Delay Seconds:</strong>
                    <input type="number" name="delay_seconds" value="{{ $slider[0]->delay_seconds }}" class="form-control" placeholder="Delay Seconds" required>
                </div>
            </div>

            <button style="width:100%; margin-top:20px; margin-bottom:50px;" type="submit" class="btn btn-success ml-3">Update</button>

        </div>
   
    </form>
</div>

</body>
</html>