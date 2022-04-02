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
                            <h4 class="pt-1 mb-0 text-light">Supplier Information</h4>
                            <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-sm">All Supplier</a>
                        </div>

                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input disabled type="text" name="supplier_name" class="form-control" value="{{ $supplier->supplier_name }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong> </label>
                                            <div class="input-group">
                                                <input disabled type="text" name="supplier_company" class="form-control" value="{{ $supplier->supplier_company }}">
                                            </div>
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                            <input disabled type="text" name="supplier_phone" class="form-control" value="{{ $supplier->supplier_phone }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>City </strong></label>
                                            <input disabled type="text" name="supplier_city" class="form-control" value="{{ $supplier->supplier_city }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>State</strong></label>
                                            <input disabled type="text" name="supplier_state" class="form-control" value="{{ $supplier->supplier_state }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong></label>
                                            <input disabled type="text" name="supplier_remarks" class="form-control" value="{{ $supplier->supplier_remarks }}">
                                        </div>
                                    </div>
                                    {{-- Part  --}}
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Email</strong></label>
                                            <input disabled type="email" name="supplier_email" placeholder="example@example.com"
                                                class="form-control" value="{{ $supplier->supplier_email }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Address <span class="text-danger">*</span></strong></label>
                                            <input disabled type="text" name="supplier_address" placeholder=""
                                                class="form-control" value="{{ $supplier->supplier_address }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Postal Code </strong></label>
                                            <input disabled type="number" name="supplier_postal" placeholder=""
                                                class="form-control" value="{{ $supplier->supplier_postal }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Country</strong></label>
                                            <input disabled type="text" name="supplier_country" placeholder=""
                                                class="form-control" value="{{ $supplier->supplier_country }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>supplier Group</strong></label>
                                            <input disabled type="text" name="supplier_state" class="form-control" value="{{ $supplier->supplier_state }}">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
