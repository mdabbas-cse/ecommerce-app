@extends('frontend.front_master')

@section('css')
<style>
    .flx {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .mt-2 {
        margin-top: 10px;
    }
</style>

@endsection

@section('content')

<div class="body-content outer-top-xs">
    <div class="container mt-3">
        <div class="row justify-content-md-center m-3">
            <div class="col-md-3">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="flx">

                            <img class="user-profile-img" src="https://www.pinclipart.com/picdir/middle/165-1655940_account-human-person-user-icon-username-png-icon.png" alt="">
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