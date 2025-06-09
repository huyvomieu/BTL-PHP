@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-light my-5">
            <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">Edit Profile</h4>
                <form action="/profilechange" method="POST">
                    @csrf
                    <div class="form-group input-group">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        <input required name="user_fullname" class="form-control" value="{{ $user->user_fullname }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        <input required name="user_email" class="form-control" value="{{ $user->user_email }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        <input required name="user_phone" class="form-control" value="{{ $user->user_phone }}">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        <input required name="user_address" class="form-control" type="text"
                            value="{{ $user->user_address }}">
                    </div>
                    </br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="change" value="Xác nhận">
                    </div>
                </form>
            </article>
        </div>
    </div>
@endsection