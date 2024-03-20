@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <section class="content">
                                    <div class="container-fluid">
                                        <h1>SUPER ADMIN</h1>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <form action="simple-results.html">
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
                                    </div>
                                </section>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row pb-3">
                                    <div class="col-12">
                                        <a href="{{route('role.create')}}" class="btn btn-primary width-100">Add Role</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($roles as $role )
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <button class="btn btn-success"><a href="{{ route('role.edit', $role->id) }}">Edit</a></button>
                                                        <button class="btn btn-danger">delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
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
