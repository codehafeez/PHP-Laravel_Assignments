@include('layouts.header')
@include('layouts.sidebar')

  <!-- page content -->
  <div class="right_col" role="main">

      <p style="font-size:30px; padding:20px; text-align:center;">Student Management System</p>
      @yield('content')

  </div>
  <!-- /page content -->


@include('layouts.footer')
