@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user )
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            @if ($user->roles->isEmpty())
                                                <td>No Role</td>
                                            @else
                                                @foreach ($user->roles as $role)
                                                    <td>{{ $role->name }}</td>
                                                @endforeach
                                            @endif
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
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
