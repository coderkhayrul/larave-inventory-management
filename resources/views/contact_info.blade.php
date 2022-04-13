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
                                <li class="breadcrumb-item active">Contact Information</li>
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
                            <h4 class="pt-1 mb-0 text-light">Contact Information</h4>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are
                                    required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('contact.info.update') }}">
                                @csrf
                                <input type="hidden" name="cont_id" value="{{ $data->cont_id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Phone 1 <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="text" name="cont_phone1" class="form-control @error('cont_phone1') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                            value="{{ $data->cont_phone1 }}">
                                            @error('cont_phone1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Email 1 </strong></label>
                                            <input type="text" name="cont_email1" class="form-control @error('cont_email1') is-invalid @enderror" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon1"
                                                value="{{ $data->cont_email1 }}">
                                                @error('cont_email1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Address </strong></label>
                                            <textarea name="cont_add1" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $data->cont_add1 }}</textarea>
                                                @error('cont_add1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Phone 2</strong></label>
                                            <input type="text" name="cont_phone2" class="form-control @error('cont_phone2') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                                value="{{ $data->cont_phone2 }}">
                                                @error('cont_phone2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Email 2 </strong></label>
                                            <input type="text" name="cont_email2" class="form-control @error('cont_email2') is-invalid @enderror" placeholder="Enter Email Address" value="{{ $data->cont_email2 }}">
                                                @error('cont_email2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Address </strong></label>
                                            <textarea name="cont_add2" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $data->cont_add2 }}</textarea>
                                                @error('cont_add2')
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
