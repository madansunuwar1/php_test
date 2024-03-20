@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid pt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12 m-3">
                        <a class="btn btn-primary" href="{{ route('role.index') }}"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('role.update', $role) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="{{ $role->name }}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input id="{{$permission->name}}" class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]" {{ ($permission->checked) ? 'checked="checked"' : ''}}>
                                            <label for="{{$permission->name}}" class="form-check-label">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
