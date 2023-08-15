<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Management System</title>
<link href="{{ asset('theme_assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme_assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme_assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
<link href="{{ asset('theme_assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme_assets/build/css/custom.min.css') }}" rel="stylesheet">
<script src="{{ asset('theme_assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('theme_assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body class="login">
<div class="login_wrapper login_content">


        @if(Session::has('error_msg'))
          <div class="alert alert-danger alert-dismissible">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('error_msg')}}</strong>
          </div>
        @endif

        <form action="{{url('islogin')}}" method="post">
        @csrf
          <h1>Student System</h1>
          <input type="text" class="form-control" name="username" placeholder="Username" required="" />
          <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          <input type="submit" style="margin:0px; width:100%;" class="btn btn-success" value="Log in">
        </form>


</div>
</body>
</html>
