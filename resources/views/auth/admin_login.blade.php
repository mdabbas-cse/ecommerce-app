<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.common.head')
</head>

<body class="hold-transition theme-primary bg-gradient-primary">

  <div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

      <div class="col-12">
        <div class="row justify-content-center  no-gutters" style="margin-top: 120px;">
          <div class="col-lg-4 col-md-5 col-12">

            <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
              <form action="{{isset($guard) ? url($guard.'/login') : ''}}" method="POST">
                @csrf
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email" required autofocus />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="checkbox text-white">
                      <input type="checkbox" name="remember" id="basic_checkbox_1">
                      <label for="basic_checkbox_1">Remember Me</label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <div class="fog-pwd text-right">
                      <a href="{{ route('password.request') }}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot password?</a><br>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <div class="text-center text-white">
                <p class="mt-20">- Sign With -</p>
                <p class="gap-items-2 mb-20">
                  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
                  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
                  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
                  <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
                </p>
              </div>

              <div class="text-center">
                <p class="mt-15 mb-0 text-white">Don't have an account? <a href="auth_register.html" class="text-info ml-5">Sign Up</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS -->
  @include('admin.common.script')

</body>

</html>