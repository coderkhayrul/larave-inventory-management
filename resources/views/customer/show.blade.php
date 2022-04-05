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
                                <li class="breadcrumb-item active">Customer</li>
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
                            <h4 class="pt-1 mb-0 text-light">Customer Information</h4>
                            <a href="{{ route('customer.index') }}" class="btn btn-primary btn-sm">All Customer</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group pb-2">
                                        <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                        <input disabled type="text" name="customer_name" class="form-control"
                                            value="{{ $customer->customer_name }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Company Name <span class="text-danger">*</span></strong> </label>
                                        <div class="input-group">
                                            <input disabled type="text" name="customer_company" class="form-control"
                                                value="{{ $customer->customer_company }}">
                                        </div>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                        <input disabled type="text" name="customer_phone" class="form-control"
                                            value="{{ $customer->customer_phone }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>City </strong></label>
                                        <input disabled type="text" name="customer_city" class="form-control"
                                            value="{{ $customer->customer_city }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>State</strong></label>
                                        <input disabled type="text" name="customer_state" class="form-control"
                                            value="{{ $customer->customer_state }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Remarks <span class="text-danger">*</span></strong></label>
                                        <input disabled type="text" name="customer_remarks" class="form-control"
                                            value="{{ $customer->customer_remarks }}">
                                    </div>
                                </div>
                                {{-- Part  --}}
                                <div class="col-md-6">
                                    <div class="form-group pb-2">
                                        <label><strong>Email</strong></label>
                                        <input disabled type="email" name="customer_email"
                                            placeholder="example@example.com" class="form-control"
                                            value="{{ $customer->customer_email }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Address <span class="text-danger">*</span></strong></label>
                                        <input disabled type="text" name="customer_address" placeholder=""
                                            class="form-control" value="{{ $customer->customer_address }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Postal Code </strong></label>
                                        <input disabled type="number" name="customer_postal" placeholder=""
                                            class="form-control" value="{{ $customer->customer_postal }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Country</strong></label>
                                        <input disabled type="text" name="customer_country" placeholder=""
                                            class="form-control" value="{{ $customer->customer_country }}">
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Customer Group</strong></label>
                                        <input disabled type="text" name="customer_state" class="form-control"
                                            value="{{ $customer->customer_state }}">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row pb-3">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success btn-sm"><i class='fas fa-file-excel'></i> Excal</a>
                            <a href="#" class="btn btn-danger btn-sm"><i class='fas fa-file-pdf'></i> PDF</a>
                            <a href="#" class="btn btn-primary btn-sm"><i class='fas fa-file-csv'></i> CVS</a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
