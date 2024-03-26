@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit {{ucwords(implode(' ', explode('-', $section->section_slug)))}}</h4>
                                <div class="card-tools">
                                    <a href="{{url(Helper::getCurrentURL().'/'.$section->section_slug)}}" class="btn btn-danger float-end">Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    $name = implode('_', explode('-', $section->section_slug));
                                @endphp
                                <form action="{{route($name.'.update', $content->id)}}" method="POST" id="content-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{$content->title}}" id="title" class="form-control{{$errors->get('title')?' is-invalid':''}}">
                                        @error('title')
                                        <span id="title-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                        <textarea name="content" id="content" rows="200" class="form-control editor{{$errors->get('description')?' is-invalid':''}}">{{$content->content}}</textarea>
                                        @error('description')
                                        <span id="description-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="row align-items-center">
                                        @php
                                            $class = 'col-12';
                                            if($content->image){
                                                $class = 'col-md-8';
                                            }
                                        @endphp
                                        <div class="form-group {{$class}}">
                                            <label for="exampleInputFile">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input{{$errors->get('image')?' is-invalid':''}}" id="slider-image">
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
                                        @if($content->image)
                                            <div class="col-md-4 img-preview position-relative">
                                                <i class="fas fa-times-circle position-absolute top-right remove-img" data-confirm="Are you sure you want to remove?"></i>
                                                <img src="{{asset('storage/uploads/'.$content->image)}}" class="img-responsive" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="read-more">Read More</label>
                                        <input type="text" name="read_more" id="read-more" class="form-control" >
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
