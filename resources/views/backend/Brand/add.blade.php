@extends('admin.admin_master')

@section('admin')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

      <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add New Brand</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <h5>Brand name english<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="brand_name_en" value="" class="form-control" required="" data-validation-required-message="This field is required">
                  </div>
                  @error('brand_name_en')
                  <span class="text-danger">{{ $message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <h5>Brand name bangla <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="brand_name_bn" value="" class="form-control" required="" data-validation-required-message="This field is required">
                  </div>
                  @error('brand_name_bn')
                  <span class="text-danger">{{ $message}}</span>
                  @enderror
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <h5>Brand Image <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" onchange="preview_image(event)" name="brand_photo" class="form-control">
                  </div>
                  @error('brand_photo')
                  <span class="text-danger">{{ $message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <img id="viewImage" style="width: 80px; height: 80px;" class="" src="" alt="User Avatar">
              </div>
            </div>
            <div class="text-xs-right">
              <button type="submit" class="btn btn-rounded btn-info px-4">Add Brand</button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>
</section>
<!-- /.content -->
@endsection

@section('js')

<script>
  const preview_image = (event) => {
    const reader = new FileReader()
    reader.onload = function() {
      const putImg = document.getElementById('viewImage')
      putImg.src = reader.result
    }
    reader.readAsDataURL(event.target.files[0])
  }
</script>
@endsection