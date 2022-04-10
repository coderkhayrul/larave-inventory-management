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
                                <li class="breadcrumb-item active">Purchase Unit</li>
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
                            <h4 class="pt-1 mb-0 text-light">Edit Purchase Unit</h4>
                            <a href="{{ route('purchase.unit.index') }}" class="btn btn-primary btn-sm">All Purchase Unit</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('purchase.unit.update',$data->pu_slug) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="pu_id" class="form-control" value="{{ $data['pu_id'] }}">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="pu_name" class="form-control @error('pu_name') is-invalid @enderror" value="{{ $data['pu_name'] }}">
                                            @error('pu_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                            <textarea class="form-control" name="pu_remarks" @error('pu_remarks') is-invalid @enderror>{{ $data['pu_remarks'] }}</textarea>
                                            @error('pu_remarks')
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
