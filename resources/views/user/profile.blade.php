@extends('layouts.app')
@section('content')
    <div class="container min-height-100">
        <div class="card bg-light mt-5">
            <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">My Profile</h4>
                <form action="" method="POST">
                    @csrf
                    @if($user)
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user-circle"></i> </span>
                            </div>
                            <input readonly name="fullname" class="form-control" value="{{ $user->user_fullname }}">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input readonly name="email" class="form-control" value="{{ $user->user_email }}">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input readonly name="phone" class="form-control" value="{{ $user->user_phone }}">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                            </div>
                            <input readonly name="address" class="form-control" type="text" value="{{ $user->user_address }}">
                        </div>
                    @else
                        <p class="text-center text-danger">User not found.</p>
                    @endif
                    <p class="text-center">
                        <a class="btn btn-outline-primary" href="{{ route('passChange') }}">Change your
                            password</a>
                    </p>
                    <p class="text-center">
                        <a class="btn btn-outline-primary" href="{{ route('profilechange') }}">Edit your profile</a>
                    </p>
                </form>
            </article>
        </div>
    </div>
@endsection