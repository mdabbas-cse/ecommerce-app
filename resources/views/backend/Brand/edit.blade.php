@extends('admin.admin_master')

@section('admin')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

      <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Brand</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{route('update.brand', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <h5>Brand name english<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="brand_name_en" value="{{$data->brand_name_en}}" class="form-control" required="" data-validation-required-message="This field is required">
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
                    <input type="text" name="brand_name_bn" value="{{$data->brand_name_bn}}" class="form-control" required="" data-validation-required-message="This field is required">
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
                    <input id="image" type="file" onchange="preview_image(event)" name="brand_photo" class="form-control">
                  </div>
                  @error('brand_photo')
                  <span class="text-danger">{{ $message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <img id="viewImage" style="width: 50px; height: 50px;" class="" src="{{asset($data->brand_photo)}}" alt="User Avatar">
                <br>
                <span id="image-remove"></span>
              </div>
            </div>
            <div class="text-xs-right">
              <button type="submit" class="btn btn-rounded btn-info px-4">Update Brand</button>
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
  const oldImage = document.getElementById('viewImage')
  const remove_btn = document.getElementById('image-remove')
  const image = document.getElementById('image')

  
  const preview_image = (event) => {
    const reader = new FileReader()
    reader.onload = function() {
      const putImg = document.getElementById('viewImage')
      putImg.src = reader.result
    }
    reader.readAsDataURL(event.target.files[0])
    remove_btn.innerHTML = '<button onclick="removeImage()" class="btn btn-sm btn-danger mt-2">Romove</button>'
    console.log(image)
  }

  const removeImage = () => {
    const currentImage = document.getElementById('viewImage')
    currentImage.src = oldImage
    image.value = ''
    remove_btn.innerHTML = ''
  }
</script>
@endsection