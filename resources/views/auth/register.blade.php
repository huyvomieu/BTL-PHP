@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black mt-4 mb-4" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <p class="text-center text-danger">

                                </p>
                                <form class="mx-1 mx-md-4" action="{{ route('registerPost') }}" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center mb-4">
                                        <label class="m-0 p-1" for="fullname">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="fullname" class="form-control" required name="fullname"
                                                placeholder="Fullname" value="{{ old('fullname') }}" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="address">
                                            <i class="fa fa-home fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="address" class="form-control" required name="address"
                                                placeholder="Address" value="{{ old('address') }}" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="email">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" class="form-control" required name="email"
                                                placeholder="Email" value="{{ old('email') }}" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="phonenumber">
                                            <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="phonenumber" class="form-control" required
                                                name="phonenumber" placeholder="Phone number"
                                                value="{{ old('phonenumber') }}" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="loginname">
                                            <i class="fa fa-user-circle fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="loginname" class="form-control" required name="username"
                                                placeholder="Login name" value="{{ old('username') }}" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="password">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password" class="form-control" required
                                                name="password" placeholder="Password" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <label class="m-0 p-1" for="password-repeat">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        </label>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password-repeat" class="form-control" required
                                                name="password-repeat" placeholder="Re-enter your password" />
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-success" name="submit">Sign up</button>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="./assets/images/banners/signup.png" class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection