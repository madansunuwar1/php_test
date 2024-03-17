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
                  <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" class="form-control" id="full_name" name="name" placeholder="Name" value="{{ $profile->name ?? '' }}">
                        </div>
                        <div class="form-group">
                          <label>club name</label>
                          <input type="text" class="form-control" id="club_name" name="club_name" placeholder="Club Name" value="{{ $profile->club_name ?? '' }}">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="you@mail.com" value="{{ $profile->email ?? '' }}">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <div class="form-group">
                          <label>Gender</label>
                          <input type="text" class="form-control" id="email" name="gender" placeholder="you@mail.com" value="{{ $profile->gender ?? '' }}">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="xxx-xxx-xxxx" name="contact" value="{{ $profile->contact ?? '' }}">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Country</label>
                          <select class="form-control select2"  name="country" style="width: 100%;">
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
                          <input type="text" class="form-control" id="date" name="date" value="{{ $profile->date ?? '' }}">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Date of birth</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="dob" value="{{ $profile->dob ?? '' }}"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Faculty and Major of study: </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="faculty" value="{{ $profile->faculty ?? '' }}" >
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Current Job/ Profession; </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="current_job" value="{{ $profile->current_job ?? '' }}">
                          </div>
                          <div class="form-group">
                            <label>Other job; </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="other_job" value="{{ $profile->other_job ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>University</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="university" value="{{ $profile->university ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Field of expertise</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="field_of_expertise" value="{{ $profile->field_of_expertise ?? '' }}" >
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Area of interest</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="area_of_interest" value="{{ $profile->area_of_interest ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Hobbies</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="hobbies" value="{{ $profile->hobbies ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Linkedin link  </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="linkedin" value="{{ $profile->linkedin ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Your Facebook profile</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="facebook" value="{{ $profile->facebook ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Intro</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="intro" value="{{ $profile->intro ?? '' }}">
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Other Links </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                      </div>
                  </div>

                  <!-- /.card-body -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

          <!-- /.card -->
        </section>
      </div>

</div>
@endsection