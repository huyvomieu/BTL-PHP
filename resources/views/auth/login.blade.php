@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center h-100 my-5">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./assets/images/banners/login.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route('loginPost') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="font-weight-bold" for="username">Login name</label>
                        <input required type="text" id="username" class="form-control form-control-lg" name="username"
                            placeholder="Enter username" autocomplete="off" />
                    </div>

                    <div class="form-outline mb-3">
                        <label class="font-weight-bold" for="password">Password</label>
                        <input required type="password" id="password" class="form-control form-control-lg" name="password"
                            placeholder="Enter password" autocomplete="off" />
                    </div>
                    <p class="text-center text-danger"><strong><?php if (isset($alert))
        echo $alert?></strong></p>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" class="btn btn-primary btn-lg" name="login"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Đăng nhập">
                        <p class="small font-weight-bold mt-2 pt-1 mb-0">"Không có tài khoản ?"
                            <a href="{{ route('register') }}" class="text-danger">Đăng Ký</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection