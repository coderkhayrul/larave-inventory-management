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
                            <h4 class="pt-1 mb-0 text-light">Create Customer</h4>
                            <a href="{{ route('customer.index') }}" class="btn btn-primary btn-sm">All Customer</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('customer.update',$customer->customer_slug) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ $customer->customer_name }}">
                                            @error('customer_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong> </label>
                                            <div class="input-group">
                                                <input type="text" name="customer_company" class="form-control @error('customer_company') is-invalid @enderror" value="{{ $customer->customer_company }}">
                                                @error('customer_company')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ $customer->customer_phone }}">
                                            @error('customer_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>



                                        <div class="form-group pb-2">
                                            <label><strong>City </strong></label>
                                            <input type="text" name="customer_city" class="form-control @error('customer_city') is-invalid @enderror" value="{{ $customer->customer_city }}">
                                            @error('customer_city')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>State</strong></label>
                                            <input type="text" name="customer_state" class="form-control @error('customer_state') is-invalid @enderror" value="{{ $customer->customer_state }}">
                                            @error('customer_state')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="customer_remarks" class="form-control @error('customer_remarks') is-invalid @enderror" value="{{ $customer->customer_remarks }}">
                                            @error('customer_remarks')
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
                                            <input type="email" name="customer_email" placeholder="example@example.com"
                                                class="form-control @error('customer_email') is-invalid @enderror" value="{{ $customer->customer_email }}">
                                            @error('customer_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Address <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="customer_address" placeholder=""
                                                class="form-control @error('customer_address') is-invalid @enderror" value="{{ $customer->customer_address }}">
                                            @error('customer_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Postal Code </strong></label>
                                            <input type="number" name="customer_postal" placeholder=""
                                                class="form-control @error('customer_postal') is-invalid @enderror" value="{{ $customer->customer_postal }}">
                                            @error('customer_postal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Country</strong></label>
                                            <input type="text" name="customer_country" placeholder=""
                                                class="form-control @error('customer_country') is-invalid @enderror" value="{{ $customer->customer_country }}">
                                            @error('customer_country')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-3">
                                            <label><strong>Customer Group <span class="text-danger">*</span></strong></label>
                                            <select class="form-select @error('cg_id') is-invalid @enderror" value="{{ old('cg_id') }}" name="cg_id">
                                                <option  selected disabled>Select Group </option>
                                                @foreach ($cg_all as $data)
                                                <option {{ $data->cg_id == $customer->cg_id ? 'selected' : '' }} title="{{ $data->cg_name}}" value="{{ $data->cg_id }}">{{ $data->cg_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cg_id')
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
