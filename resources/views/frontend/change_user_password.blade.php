@extends('frontend.front_master')

@section('css')
<style>
  .flx {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .user-profile-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
  }

  .mt-2 {
    margin-top: 10px;
  }
</style>

@endsection

@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li class='active' href="{{route('dashboard')}}">Dashboard</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class="container mt-3">
    <div class="row justify-content-md-center m-3">
      <div class="col-md-3">
        <div class="card mt-3">
          <div class="card-body">
            <div class="flx">
              <?php

              if (Auth::user()->provider_id) {
                $img_path = Auth::user()->profile_photo_path;
              } elseif (Auth::user()->profile_photo_path) {
                $img_path = url('upload/user_images/' . Auth::user()->profile_photo_path);
              } else {
                $img_path = "https://ui-avatars.com/api/?name=" . Auth::user()->name . "&background=random";
              }
              ?>
              <img id='previewImage' class="user-profile-img" src="{{$img_path}}" alt="user profile image">
            </div>
            <ul class="list-group">
              <a href="{{route('dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center">
                Profile
              </a>
              <a href="{{ route('user.edit.password') }}" class="list-group-item d-flex justify-content-between align-items-center">
                Change password

              </a>
              <a href="{{ route('user.logout') }}" class="list-group-item d-flex justify-content-between align-items-center">
                Logout

              </a>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card well">
          <div class="card-body">
            <form method="POST" action="{{route('user.update.password')}}">
              @csrf
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="current_password" class="form-control" id="password" aria-describedby="password">
                <small class="text-danger">{{$errors->first('current_password')}}</small>
              </div>
              <div class="mb-3">
                <label for="newpassword" class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" id="newpassword">
                <small class="text-danger">{{$errors->first('password')}}</small>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                <small class="text-danger">{{$errors->first('password_confirmation')}}</small>
              </div>
              <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
  const putImage = document.getElementById('previewImage')
  const oldImage = putImage.currentSrc
  console.log(oldImage)
  const previewImage = (event) => {
    const reader = new FileReader()

    reader.onload = () => {
      putImage.src = reader.result
    }
    reader.readAsDataURL(event.target.files[0])
  }
</script>
@endsection