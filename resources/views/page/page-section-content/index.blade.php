@php use App\Helper\Constant;use App\Helper\Helper;use Carbon\Carbon; @endphp
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
                                    <h1>{{ucwords(implode(' ', explode('-', Helper::getCurrentURL())))}} {{$section->section_title}}</h1>
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
                                    <a href="{{url(Helper::getCurrentURL().'/'.Helper::getCurrentURL(2).'/create')}}" class="btn btn-primary width-100">Add Content</a>
                                    @if($section)
                                        <input type="text" class="btn" disabled value="Template:{{$section?->templates?->template_title}}">
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contents as $content )
                                        <tr>
                                            <td>{{$content?->title}}</td>
                                            <td>{{Helper::getUser($content->user_id)?->name}}</td>
                                            <td>{{$content->created_at->format('F j, Y g:i a')}}</td>
                                            <td>
                                                @php
                                                    $name = implode('_', explode('-', $section->section_slug));
                                                @endphp
                                                <a href="{{ route($name.'.edit', $content->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route($name.'.destroy', $content->id) }}" method="POST" style="display: inline;">
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
