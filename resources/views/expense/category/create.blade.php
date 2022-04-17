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
                                <li class="breadcrumb-item active">Expense</li>
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
                            <h4 class="pt-1 mb-0 text-light">Create Expense Category</h4>
                            <a href="{{ route('expense.category.index') }}" class="btn btn-primary btn-sm">All Expense Category</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('expense.category.store') }}">
                                @csrf
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Code <span class="text-danger">*</span></strong> </label>
                                            {{-- <input type="text" name="expcate_code" class="form-control @error('expcate_code') is-invalid @enderror" value="{{ old('expcate_code') }}"> --}}
                                            <div class="input-group mb-3">
                                                <input type="text" id="code_output" name="expcate_code" class="form-control @error('expcate_code') is-invalid @enderror">
                                                <button class="btn btn-outline-primary" type="button" id="expcate_generated">Generate</button>
                                            </div>
                                            @error('expcate_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="expcate_name" class="form-control @error('expcate_name') is-invalid @enderror" value="{{ old('expcate_name') }}">
                                            @error('expcate_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                            <textarea class="form-control" name="expcate_remarks" @error('expcate_remarks') is-invalid @enderror></textarea>
                                            @error('expcate_remarks')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <input type="submit" value="Submit" class="btn btn-primary">
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
    <script>
            $( "#expcate_generated" ).click(function() {
                const characters ='0123456789';

                function generateString(length) {
                    let result = ' ';
                    const charactersLength = characters.length;
                    for ( let i = 0; i < length; i++ ) {
                        result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    }
                    return result;
                }
                var result = generateString(8);
                $('#code_output').val(result);
            });

    </script>
@endsection
