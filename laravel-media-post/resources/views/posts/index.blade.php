<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Media Post</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-bottom:50px;">
        
    <div style="margin-bottom:50px;">
    <h3 style="text-align:center; margin:50px;">Media Post</h3>
    <a style="margin-left:5px;" class="float-right btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
    <a style="margin-left:5px;" class="float-right btn btn-success" href="./slider"> Update Slider Delay Time</a>
    </div>
   

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Media Type</th>
            <th style="width:180px;">Action</th>
        </tr>
        
        @foreach ($posts as $post)
        
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->media_type }}</td>
            <td>
                <center>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </center>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $posts->links() !!}

</body>
</html>