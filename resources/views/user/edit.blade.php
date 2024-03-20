@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>Edit User</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                    @if($user->role[0]->name == 'admin')
                                        <div class="mb-3">
                                            <label for="admin" class="form-label">Role</label>
                                            <select id="admin" class="form-control" disabled>
                                                <option value="{{$user->role[0]->id}}">{{$user->role[0]->nameZZ}}</option>
                                            </select>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role_id', $roleId) == $role->id ? 'selected' : '' }}>
                                                        {{ ucwords(str_replace('_', ' ', $role->name)) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif


                                    <!-- Add other fields as needed -->
                                    <button type="submit" class="btn btn-primary">Update</button>
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
