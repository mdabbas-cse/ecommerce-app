<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta -->
  @include('frontend.common.head')
  @yield('css')
</head>

<body class="cnt-home">
  <!-- ============================================== HEADER ============================================== -->
  @include('frontend.common.header')

  <!-- ============================================== HEADER : END ============================================== -->
  <!-- #top-banner-and-menu  -->
  @yield('content')
  <!-- /#top-banner-and-menu -->

  <!-- ============================================================= FOOTER ============================================================= -->
  @include('frontend.common.footer')
  <!-- ============================================================= FOOTER : END============================================================= -->

  <!-- For demo purposes – can be removed on production -->

  <!-- For demo purposes – can be removed on production : End -->

  <!-- JavaScripts placed at the end of the document so the pages load faster -->
  @include('frontend.common.script')
  @yield('js')

</body>

</html>