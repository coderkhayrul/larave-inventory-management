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
                                <li class="breadcrumb-item active">Supplier</li>
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
                            <h4 class="pt-1 mb-0 text-light">Edit Supplier</h4>
                            <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-sm">All Supplier</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('supplier.update',$supplier->supplier_slug) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" value="{{ $supplier->supplier_name }}">
                                            @error('supplier_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong> </label>
                                            <div class="input-group">
                                                <input type="text" name="supplier_company" class="form-control @error('supplier_company') is-invalid @enderror" value="{{ $supplier->supplier_company }}">
                                                @error('supplier_company')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="supplier_phone" class="form-control @error('supplier_phone') is-invalid @enderror" value="{{ $supplier->supplier_phone }}">
                                            @error('supplier_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>



                                        <div class="form-group pb-2">
                                            <label><strong>City </strong></label>
                                            <input type="text" name="supplier_city" class="form-control @error('supplier_city') is-invalid @enderror" value="{{ $supplier->supplier_city }}">
                                            @error('supplier_city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>State</strong></label>
                                            <input type="text" name="supplier_state" class="form-control @error('supplier_state') is-invalid @enderror" value="{{ $supplier->supplier_state }}">
                                            @error('supplier_state')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="supplier_remarks" class="form-control @error('supplier_remarks') is-invalid @enderror" value="{{ $supplier->supplier_remarks }}">
                                            @error('supplier_remarks')
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
                                            <input type="email" name="supplier_email" placeholder="example@example.com"
                                                class="form-control @error('supplier_email') is-invalid @enderror" value="{{ $supplier->supplier_email }}">
                                            @error('supplier_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Address <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="supplier_address" placeholder=""
                                                class="form-control @error('supplier_address') is-invalid @enderror" value="{{ $supplier->supplier_address }}">
                                            @error('supplier_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Postal Code </strong></label>
                                            <input type="number" name="supplier_postal" placeholder=""
                                                class="form-control @error('supplier_postal') is-invalid @enderror" value="{{ $supplier->supplier_postal }}">
                                            @error('supplier_postal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Country</strong></label>
                                            <input type="text" name="supplier_country" placeholder=""
                                                class="form-control @error('supplier_country') is-invalid @enderror" value="{{ $supplier->supplier_country }}">
                                            @error('supplier_country')
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
