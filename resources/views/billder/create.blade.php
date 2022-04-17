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
                                <li class="breadcrumb-item active">Biller</li>
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
                            <h4 class="pt-1 mb-0 text-light">Create Biller</h4>
                            <a href="{{ route('biller.index') }}" class="btn btn-primary btn-sm">All Biller</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('biller.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="biller_name" class="form-control @error('biller_name') is-invalid @enderror" value="{{ old('biller_name') }}">
                                            @error('biller_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong> </label>
                                            <div class="input-group">
                                                <input type="text" name="biller_company" class="form-control @error('biller_company') is-invalid @enderror" value="{{ old('biller_company') }}">
                                                @error('biller_company')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="biller_phone" class="form-control @error('biller_phone') is-invalid @enderror" value="{{ old('biller_phone') }}">
                                            @error('biller_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>



                                        <div class="form-group pb-2">
                                            <label><strong>City </strong></label>
                                            <input type="text" name="biller_city" class="form-control @error('biller_city') is-invalid @enderror" value="{{ old('biller_city') }}">
                                            @error('biller_city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="biller_email" placeholder="example@example.com"
                                                class="form-control @error('biller_email') is-invalid @enderror" value="{{ old('biller_email') }}">
                                            @error('biller_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Address <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="biller_address" placeholder=""
                                                class="form-control @error('biller_address') is-invalid @enderror" value="{{ old('biller_address') }}">
                                            @error('biller_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Country</strong></label>
                                            <input type="text" name="biller_country" placeholder=""
                                                class="form-control @error('biller_country') is-invalid @enderror" value="{{ old('biller_country') }}">
                                            @error('biller_country')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
