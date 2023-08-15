# ======================================================
# cmd run command -> laravel new hafeez-app
# cmd run project -> php artisan serve 
# ======================================================



# ========================================================
# extends, section, yield => Example View Layout
# ========================================================


# default.blade.php => code
# ========================================================
<html>
<body>
@yield('header')
@yield('content')
@yield('footer')
</body>
</html>


# ========================================================
# welcome.blade.php => code
# ========================================================
@extends('default')

@section('header')
    <p>View one's header</p>
@endsection

@section('content')
    <p>View one's content</p>
@endsection

@section('footer')
   <p>View one's footer</p>
@endsection
# ======================================================



