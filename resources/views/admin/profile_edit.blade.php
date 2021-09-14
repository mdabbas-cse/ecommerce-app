@extends('admin.admin_master')

@section('admin')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <section class="content">

        <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Admin Information</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form novalidate="">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <h5>Username<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="text" name="name" value="{{$adminProfile->name}}" class="form-control" required="" data-validation-required-message="This field is required">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <h5>Email <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input type="email" name="email" value="{{$adminProfile->email}}" class="form-control" required="" data-validation-required-message="This field is required">
                    </div>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <h5>File Input Field <span class="text-danger">*</sprofile_photo_pathpan>
                    </h5>
                    <div class="controls">
                      <input type="file" onchange="preview_image(event)" name="profile_photo_path" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <img id="viewImage" style="width: 80px; height: 80px;" class="" src="{{!empty($adminProfile->profile_photo_path) ? url('upload/admin_images/$adminProfile->') : 'https://ui-avatars.com/api/?name='.$adminProfile->name}}" alt="User Avatar">
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
  const preview_image = (event) => {
    
    const reader = new FileReader();
    reader.onload = function() {
      const output = document.getElementById('viewImage');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection