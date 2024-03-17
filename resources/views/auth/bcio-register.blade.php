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
                                            <label for="club-name">Bridge club Name</label>
                                            <input type = "text" id="club-name" name="club_name" value=""
                                                class="form-control not-dark">
                                        </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-fullname">Full Name:</label>
                                                <input type="text" id="register-form-fullname"
                                                    name="name" value=""
                                                    class="form-control not-dark">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="country">Country:</label>
                                                <input type="text" id="country" name="country"
                                                    value="" class="form-control not-dark">
                                            </div>
                                                <label for="position">Position in your BC: </label>
                                                <input type="text" id="position" name="position"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="register-form-apcc">Year of Participation in APCC as a Junior Ambassador (JA):</label>
                                                <input type="text" id="register-form-apcc" name="date"
                                                    value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="personal-email">Personal Email address:</label>
                                                <input type="email" id="personal-email" name="personal_email"
                                                    value="" class="form-control not-dark">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="register-form-phone">Contact Number:</label>
                                                <input type="text" id="register-form-phone" name="contact"
                                                    value="" class="form-control not-dark">

                                            <div class="col-12 form-group">
                                                <label for="register-form-email">BC Official Email address:</label>
                                                <input type="email" id="register-form-email" name="email"
                                                    value="" class="form-control not-dark">
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