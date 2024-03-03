@extends('layouts.app')
@section('content')
<section id="content">
            <div class="content-wrap py-0">

                <div class="section dark p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-transparent p-0 m-0 d-flex">
                    <div class="vertical-middle my-6">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h3>BCIO Member <span>Registration</span></h3>
                            <div class="gradient-border"></div>
                        </div>
                        <div class="container pt-5">
                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                                <div class="card-body" style="padding: 40px;">
                                <form method="POST" action="{{ route('register') }}">
                                         @csrf
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="register-form-fullname">Full Name:</label>
                                                <input type="text" id="register-form-fullname"
                                                    name="name" value=""
                                                    class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-apcc">APCC Join Date:</label>
                                                <input type="text" id="register-form-apcc" name="date"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-email">Email ID:</label>
                                                <input type="text" id="register-form-email" name="email"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-gender">Gender:</label>
                                                <select type="text" id="register-form-gender"
                                                    name="gender" class="form-control not-dark">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="register-form-password">Password:</label>
                                                <input type="password" id="register-form-password"
                                                    name="password" value=""
                                                    class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-country">Country:</label>
                                                <select type="text" id="register-form-country"
                                                    name="country" class="form-control not-dark">
                                                    <option>Nepal</option>
                                                    <option>Japan</option>
                                                    <option>USA</option>
                                                </select>
                                            </div>

                                            <div class="col-12 form-group mb-0">
                                                <div class="text-center mt-3">
                                                    <button class="button button-rounded w-50" id="login-form-submit"
                                                        type="submit" >Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->
@endsection