@extends('layouts.dash')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BCPN Member Verification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Members</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        S.N
                                    </th>
                                    <th style="width: 20%">
                                        Name
                                    </th>
                                    <th style="width: 20%">
                                        Phone No
                                    </th>
                                    <th style="width: 20%">
                                        Email
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bcios as $bcio)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            {{$bcio->name}}
                                        </a>
                                        <br />
                                        <small>
                                            {{$bcio->club_name}}
                                        </small>
                                    </td>
                                    <td>
                                        <p>
                                            {{$bcio->contact}}
                                        </p>
                                    </td>
                                    <td class="project_progress">
                                        <p>
                                            {{$bcio->email}}
                                        </p>
                                    </td>
                                    <td class="project-state">
                                        @if($bcio->status == 'pending')
                                        <span class="badge badge-warning"> {{$bcio->status}}</span>
                                        @elseif($bcio->status == 'verified')
                                        <span class="badge badge-success"> {{$bcio->status}}</span>
                                        @elseif($bcio->status == 'rejected')
                                        <span class="badge badge-danger"> {{$bcio->status}}</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                    <form action="{{ route('verification.bcio.update', ['id' => $bcio->id]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="item_id" value=" {{$bcio->id}}">
    
    <button type="submit" name="status" value="verified" class="btn btn-primary btn-sm">
        <i class="fas fa-folder"></i> Verify
    </button>
    
    <button type="submit" name="status" value="deny" class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Deny
    </button>
</form>

                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection