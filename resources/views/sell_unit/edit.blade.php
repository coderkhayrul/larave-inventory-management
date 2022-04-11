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
                                <li class="breadcrumb-item active">Sell Unit</li>
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
                            <h4 class="pt-1 mb-0 text-light">Edit Sell Unit</h4>
                            <a href="{{ route('sell.unit.index') }}" class="btn btn-primary btn-sm">All Sell Unit</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('sell.unit.update',$data->su_slug) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="su_id" class="form-control" value="{{ $data['su_id'] }}">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="su_name" class="form-control @error('su_name') is-invalid @enderror" value="{{ $data['su_name'] }}">
                                            @error('su_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                            <textarea class="form-control" name="su_remarks" @error('su_remarks') is-invalid @enderror>{{ $data['su_remarks'] }}</textarea>
                                            @error('su_remarks')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Purchase Unit<span class="text-danger">*</span></strong> </label>
                                            <select class="form-select @error('pu_id') is-invalid @enderror" value="{{ old('pu_id') }}" name="pu_id">
                                                <option  selected disabled>Select Unit </option>
                                                @foreach ($pu_all as $pu_data)
                                                <option title="{{ $pu_data->pu_name}}" value="{{ $pu_data->pu_id }}" {{ $data->pu_id ==  $pu_data->pu_id ? 'selected' : ''}}>{{ $pu_data->pu_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pu_id')
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
