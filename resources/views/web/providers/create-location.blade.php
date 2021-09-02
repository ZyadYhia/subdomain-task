@extends('admin.layout')
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Provider</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Create Locations
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
                    <div class="col-12 pb-3">
                        @include('admin.includes.errors')
                        <form id="add-new-form" action="{{ url('providers/store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 alert alert-warning">
                                        <p>you have only {{5 - $locations_count}} left locations</p>
                                    </div>
                                    @for ($i = 1; $i < (6 - $locations_count); $i++)
                                        <h4 class="col-12">New Location</h4>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Longitude:</label>
                                                <input type="number" class="form-control" name="long[]">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Latitude:</label>
                                                <input type="number" class="form-control" name="latt[]">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-primary" data-dismiss="modal">Back</a>
                            <button type="submit" form="add-new-form" class="btn btn-success">Submit</button>
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
