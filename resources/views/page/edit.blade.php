@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Slider</h4>
                                <div class="card-tools">
                                    <a href="{{url('slider')}}" class="btn btn-danger float-end">Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('slider.update', $slider)}}" id="banner-slider-edit-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{$slider->title}}" id="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control editor">{{$slider->description}}</textarea>
                                    </div>
                                    <div class="row align-items-center">
                                        @php
                                            $class = 'col-12';
                                            if($slider->image){
                                                $class = 'col-md-8';
                                            }
                                        @endphp
                                        <div class="form-group {{$class}}">
                                            <label for="exampleInputFile">Slider Image*</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input {{$errors->get('image')?'is-invalid':''}}" id="slider-image">
                                                    <label class="custom-file-label" for="slider-image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('image')
                                            <span id="slider-image-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                            @enderror
                                        </div>
                                        @if($slider->image)
                                            <div class="col-md-4">
                                                <img src="{{asset('storage/uploads/'.$slider->image)}}" width="100px" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Minimal</label>
                                        <select id="status" name="status" class="form-control select2bs4" style="width: 100%">
                                            <option value="1" selected="selected">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
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
