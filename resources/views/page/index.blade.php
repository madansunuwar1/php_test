@php use App\Helper\Constant; @endphp
@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12">
                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <div class="card mt-3">
                            <div class="card-header">
                                <section class="content">
                                    <h1>SLIDER</h1>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <form action="">
                                                <div class="input-group">
                                                    <input type="search" class="form-control form-control-sm" placeholder="Type your keywords here">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-sm btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <div class="mt-3">
                                    <a href="{{url('slider/create')}}" class="btn btn-primary width-100">Add Slider</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sliders as $slider )
                                        <tr>
                                            <td>{{ $slider?->title }}</td>
                                            <td>{{ Str::words(strip_tags($slider?->description), 10) }}</td>
                                            <td><img src="{{asset('storage/uploads/'.$slider->image)}}" alt="" width="50px"></td>
                                            <td>{{Constant::status($slider->status)}}</td>
                                            <td>
                                                <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('slider.destroy', $slider) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
