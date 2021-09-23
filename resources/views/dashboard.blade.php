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
                                $img_path = "https://ui-avatars.com/api/?name=" . Auth::user()->name . "&background=random";
                            }
                            ?>
                            <img class="user-profile-img" src="{{$img_path}}" alt="user profile image">
                        </div>
                        <ul class="list-group">
                            <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                Profile
                            </a>
                            <a href="" class="list-group-item d-flex justify-content-between align-items-center">
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
                        <form method="POST" action="{{route('user.update')}}">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Phone</label>
                                <input type="file" name="profile_photo_path" class="form-control" id="image">
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