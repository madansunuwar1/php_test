@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create {{Helper::getCurrentURL(1)}} {{Helper::getCurrentURL(2)}}</h4>
                                <div class="card-tools">
                                    <a href="{{url(Helper::getCurrentURL(1),Helper::getCurrentURL(2))}}" class="btn btn-danger float-end">Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('section.store') }}" method="POST" id="section-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="status">Template</label>
                                        <select id="status" name="content_templates_id" class="form-control select2bs4" style="width: 100%">
                                            @foreach($templates as $template)
                                                <option value="{{$template->id}}">{{$template->template_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="section_title" value="" id="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="section_description">Description</label>
                                        <textarea name="section_description" id="section_description" class="form-control editor"></textarea>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="form-group col-12">
                                            <label for="exampleInputFile">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input {{$errors->get('image')?'is-invalid':''}}" id="section-image">
                                                    <label class="custom-file-label" for="slider-image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('image')
                                            <span id="section-image-error" class="error invalid-feedback" style="display: inline;">{{$message}}</span>
                                            @enderror
                                        </div>
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
