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
    <h3 style="text-align:center; margin:50px;">Edit Post</h3>
    <a class="btn btn-primary" href="{{ route('posts.index') }}" enctype="multipart/form-data"> Back</a>
    </div>

   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
  
    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Post Title" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Description:</strong>
                    <textarea class="form-control" rows="4" name="description" placeholder="Post Description" required>{{ $post->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Upload Media:</strong>
                     <input type="file" name="file" class="form-control" accept="video/mp4,image/*">
                </div>

                <div class="form-group">
                    @if ($post->media_type == 'Image')
                        <img src="{{url('/uploads/'.$post->media_path)}}" height="250" width="250"/>
                    @else
                    <video width="250" height="250" controls>
                        <source src="{{url('/uploads/'.$post->media_path)}}" type="video/mp4">
                    </video>
                    @endif
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
        <option value="Active" {{ $post->status == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Not Active" {{ $post->status == 'Not Active' ? 'selected' : '' }}>Not Active</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-submit btn btn-success ml-3">Update</button>

        </div>   
    </form>
</div>

</body>
</html>