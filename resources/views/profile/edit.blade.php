@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6"><a href="/bcpn-member-verification.html"><i class="fas fa-angle-left"></i>Back</a></div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Edit profile</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('profile.update',$profile?->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="full_name" name="name" placeholder="Name" value="{{ $profile?->name ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="you@mail.com" value="{{ $profile?->email ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="xxx-xxx-xxxx" value="{{ $profile?->contact ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select2" name="country" style="width: 100%;">
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Year of Participation in APCC as a Junior Ambassador (JA):</label>
                                            <input type="text" class="form-control" id="date" name="date" value="{{ $profile?->date ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Established on</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="established_on"
                                                       value="{{ $profile?->established_on ?? '' }}"/>
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Position</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="position" value="{{ $profile?->position ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Personal Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="personal_email" value="{{ $profile?->personal_email ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="status" value="{{ $profile?->status ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Club Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="club_name" value="{{ $profile?->club_name ?? '' }}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>


                                    <!-- /.col -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Based on: </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="based_on" value="{{ $profile?->based_on ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>President: </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="president" value="{{ $profile?->president ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact us </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="contact" value="{{ $profile?->contact ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Activities</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="activities" value="{{ $profile?->activities ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tel</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="telephone" value="{{ $profile?->telephone ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="fax" value="{{ $profile?->fax ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Instagram link </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="instagram" value="{{ $profile?->instagram ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Your Facebook profile</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="facebook" value="{{ $profile?->facebook ?? '' }}">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    {{--<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your LinkedIn profile </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Other Links </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other Links </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Other Links</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>--}}
                                </div>

                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </section>
        </div>

    </div>
@endsection
