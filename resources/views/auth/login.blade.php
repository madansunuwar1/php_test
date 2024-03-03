@extends('layouts.app')
@section('content')
    <section id="content">
            <div class="content-wrap py-0">

                <div class="section dark p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-transparent p-0 m-0 d-flex">
                    <div class="vertical-middle">
                        <div class="container py-5">
                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                                <div class="card-body" style="padding: 40px;">
                                    <div class="login"><i class="fa-regular fa-circle-user"></i></div>
                                    <form method="POST" action="{{ route('login') }}">
        @csrf
                                        <h3 class="text-center">LOGIN</h3>

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login-form-username">Email:</label>
                                                <input type="text" id="login-form-username" name="email"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="login-form-password">Password:</label>
                                                <input type="password" id="login-form-password"
                                                    name="password" value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group mb-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1" data-dashlane-rid="8a950531f7bb929c"
                                                            data-form-type="other">
                                                        <label class="form-check-label" for="exampleCheck1">Stay logged
                                                            in.</label>
                                                    </div>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <button class="button button-rounded w-50" id="login-form-submit"
                                                        name="login-form-submit" value="login">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="line line-sm"></div>

                                    <div class="text-center">
                                        <h4 class="mb-3">Sign Up</h4>
                                        <a href="{{ route('register') }}" class="button button-rounded bg-primary w-100">BCIO Member
                                            Registration</a>
                                        <p class="my-2">or</p>
                                        <a href="{{ route('register') }}" class="button button-rounded bg-bcpn w-100">BCPN User
                                            Registration</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->
@endsection