@extends('layout.account')

@section('register')
    <div class="row">
        <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-8">
                  
                    <div class="mb-4">
                        <h3>Register to <strong>Shoping Cart</strong></h3>
                        <br>
                    </div>

                    <form action="/Account/Register" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group first">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group first">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group last mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group last mb-4">
                            <label for="conPassword">Confirm Password</label>
                            <input type="password" name="conPassword" class="form-control" id="conPassword">
                            @error('conPassword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" />
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        <input type="submit" value="Register Now" class="btn text-white btn-block btn-primary">
                        <span class="d-block text-left my-4 text-muted"> or sign in with</span>

                        <div class="social-login">
                            <a href="#" class="facebook">
                                <span class="icon-facebook mr-3"></span>
                            </a>
                            <a href="#" class="twitter">
                                <span class="icon-twitter mr-3"></span>
                            </a>
                            <a href="#" class="google">
                                <span class="icon-google mr-3"></span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <img src="{{ url('/Register/images/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid">
        </div>
    </div>
@endsection
