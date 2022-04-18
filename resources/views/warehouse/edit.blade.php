@extends('layouts.admin-layout')

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">WareHouse</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark d-flex justify-content-between">
                            <h4 class="pt-1 mb-0 text-light">Create WareHouse</h4>
                            <a href="{{ route('warehouse.index') }}" class="btn btn-primary btn-sm">All WareHouse</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('warehouse.update',$data->wh_slug) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="wh_id" value="{{ $data->wh_id }}"
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="wh_name" class="form-control @error('wh_name') is-invalid @enderror" value="{{ $data->wh_name }}">
                                            @error('wh_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="wh_phone" class="form-control @error('wh_phone') is-invalid @enderror" value="{{ $data->wh_phone }}">
                                            @error('wh_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Email <span class="text-danger">*</span></strong> </label>
                                            <input type="email" name="wh_email" class="form-control @error('wh_email') is-invalid @enderror" value="{{ $data->wh_email }}">
                                            @error('wh_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Address <span class="text-danger">*</span></strong> </label>
                                            <textarea class="form-control" name="wh_address" @error('wh_address') is-invalid @enderror> {{ $data->wh_address }} </textarea>
                                            @error('wh_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
