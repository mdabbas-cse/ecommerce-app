@extends('admin.admin_master')

@section('admin')
<!-- Main content -->
<section class="content">
  <div class="row justify-content-md-center">
    <div class="col-8">
      <section class="content">

        <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Admin Change Password</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{route('admin.update.password')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <h5>Current Password<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="password" name="current_password" value="" class="form-control" required="" data-validation-required-message="This field is required">
                    </div>
                    <div class="form-control-feedback text-danger">
                      <small>{{$errors->first('current_password')}}</small>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <h5>New Password<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="password" name="password" value="" class="form-control" required="" data-validation-required-message="This field is required">
                    </div>
                    <div class="form-control-feedback text-danger">
                      <small>{{$errors->first('password')}}</small>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <h5>Confirmed Password<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="password" name="password_confirmation" value="" class="form-control" required="" data-validation-required-message="This field is required">
                    </div>
                    <div class="form-control-feedback text-danger">
                      <small>{{$errors->first('password_confirmation')}}</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-xs-right">
                <button type="submit" class="btn btn-rounded btn-info px-4">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
    </div>
  </div>
</section>
<!-- /.content -->
@endsection

@section('js')
<script>

</script>
@endsection