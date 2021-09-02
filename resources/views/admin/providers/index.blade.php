@extends('admin.layout')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Providers</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Providers
                            </li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('admin.includes.messages')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Providers</h3>

                                {{-- <div class="card-tools">
                                    <button id="add-cart-modat" type="button" class="btn btn-primary btn-sm"
                                        data-toggle="modal" data-target="#new-modal">
                                        Add Admin
                                    </button>
                                </div> --}}
                                <div class="card-tools">
                                    <a href="{{ url('dashboard/providers/create') }}" class="btn btn-primary btn-sm">
                                        Add Provider
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>E-mail</th>
                                            <th>Verified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($providers as $provider)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $provider->name }}</td>
                                                <td>{{ $provider->user_name }}</td>
                                                <td>{{ $provider->email }}</td>
                                                <td>
                                                    @if ($provider->email_verified_at)
                                                        <span class="badge badge-success">Verified</span>
                                                    @else
                                                        <span class="badge badge-danger">Not Verified</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url("dashboard/providers/delete/$provider->id") }}"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
