<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Media Post</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<style>
.btn-submit {
    width:100%;
    margin-top:20px;
    margin-bottom:50px;
}
</style>
</head>
<body>
<div class="container">

    <div style="margin-bottom:20px;">
    <h3 style="text-align:center; margin:50px;">Add New Post</h3>
    <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data"> Back</a>
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">{{ session('status') }}</div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Post Title" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Description:</strong>
                    <textarea class="form-control" rows="4" name="description" placeholder="Post Description" required></textarea>
                </div>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Upload Media:</strong>
                    <input type="file" name="file" class="form-control" required accept="video/mp4,image/*">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        <option value="Active">Active</option>
                        <option value="Not Active">Not Active</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-submit btn btn-success ml-3">Submit</button>
            
        </div>       
    </form>

</body>
</html>
