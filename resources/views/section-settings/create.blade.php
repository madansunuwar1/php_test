@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create {{ucwords(implode(' ', explode('-', Helper::getCurrentURL())))}}</h4>
                                <div class="card-tools">
                                    <a href="{{url(Helper::getCurrentURL())}}" class="btn btn-danger float-end">Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{url(Helper::getCurrentURL())}}" method="POST" id="banner-slider-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control{{$errors->get('title')?' is-invalid':''}}">
                                        @error('title')
                                        <span id="title-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" rows="200" class="form-control editor{{$errors->get('description')?' is-invalid':''}}"></textarea>
                                        @error('description')
                                        <span id="description-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
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
