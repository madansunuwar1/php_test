@extends('layouts.dash')

@section('content')
<div class="content-wrapper">
<div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add role</h3>
                    </div>
                    <div class="row">
        <div class="col-sm-12 mb-3">
        	<a class="btn btn-primary" href="{{ route('role.index') }}"><i class="fas fa-chevron-left"></i> {{ __('Back') }}</a>
        </div>
    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                @foreach($permissions as $permission)
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]">
										<label class="form-check-label">{{ $permission->name }}</label>
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
@endsection