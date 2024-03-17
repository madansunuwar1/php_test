@extends('layouts.dash')

@section('content')
<div class="content-wrapper">
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">{{$profile->name}}</h3>
            <h5 class="widget-user-desc">BCPN HEAD</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar" />
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">Likes</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">Works</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
    </div>
  </div>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">About Me</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="fas fa-user mr-1"></i>Name</strong>

      <p class="text-muted">
      {{$profile->name}}
      </p>

      <hr>

      <strong><i class="fas fa-map-marker-alt mr-1"></i>Country</strong>

      <p class="text-muted">{{$profile->country}}</p>

      <hr>

      <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

      <p class="text-muted">
        <span class="tag tag-danger">UI Design</span>
        <span class="tag tag-success">Coding</span>
        <span class="tag tag-info">Javascript</span>
        <span class="tag tag-warning">PHP</span>
        <span class="tag tag-primary">Node.js</span>
      </p>

      <hr>

      <strong><i class="fas fa-phone mr-1"></i>phone</strong>

      <p class="text-muted">{{$profile->contact}}</p>
      <hr>

      <strong><i class="fas fa-envelope mr-1"></i>Email</strong>

      <p class="text-muted">{{$profile->email}}</p>
      <hr>

      <strong><i class="far fa-building-columns mr-1"></i>University</strong>

      <p class="text-muted">{{$profile->university}}</p>
      <hr>

      <strong><i class="fas fa-link mr-1"></i>Links</strong>

      <p class="text-muted"><span><i class="fab fa-facebook mr-3"></i></span><span><i class="fab fa-linkedin mr-3"></i></span><span><i class="fab fa-line mr-3"></i></span></p>
      <a href="{{route('profile.edit', $profile->email)}}" class="btn btn-primary">Edit Profile</a>    </div>
    <!-- /.card-body -->
  </div>
</section>
</div>
@endsection