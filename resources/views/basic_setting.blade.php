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
                                <li class="breadcrumb-item active">Basic Setting</li>
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
                            <h4 class="pt-1 mb-0 text-light">Basic Setting</h4>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are
                                    required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('basic.setting.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="basic_id" value="{{ $data->basic_id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="text" name="basic_company"
                                                class="form-control @error('basic_company') is-invalid @enderror"
                                                value="{{ $data->basic_company }}">
                                            @error('basic_company')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Main Logo Upload <span
                                                        class="text-danger">*</span></strong></label>
                                            <input type="file" id="mainlogo-fileinput" name="basic_logo"
                                                class="form-control @error('basic_logo') is-invalid @enderror">
                                            @error('basic_logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Footer Logo Upload </strong></label>
                                            <input type="file" id="footerlogo-fileinput" name="basic_flogo"
                                                class="form-control @error('basic_flogo') is-invalid @enderror">
                                            @error('basic_flogo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Favicon Upload </strong></label>
                                            <input type="file" id="favicon-fileinput" name="basic_favicon"
                                                class="form-control @error('basic_favicon') is-invalid @enderror">
                                            @error('basic_favicon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update Setting" class="btn btn-primary">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Title</strong></label>
                                            <input type="text" name="basic_title"
                                                class="form-control @error('basic_title') is-invalid @enderror"
                                                value="{{ $data->basic_title }}">
                                            @error('basic_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_logo)
                                            <img id="main-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_logo) }}"
                                                alt="image" class="img-fluid rounded" width="80">
                                            @else
                                            <img id="main-preview-image" src="{{ asset('uploads/default_user.png') }}"
                                                alt="basic_logo" class="img-fluid rounded" width="70" />
                                            @endif
                                        </div>
                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_flogo)
                                            <img id="footer-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_flogo) }}"
                                                alt="image" class="img-fluid rounded" width="80">
                                            @else
                                            <img id="footer-preview-image" src="{{ asset('uploads/default_user.png') }}"
                                                alt="basic_flogo" class="img-fluid rounded" width="70" />
                                            @endif
                                        </div>

                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_favicon)
                                            <img id="favicon-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_favicon) }}"
                                                alt="image" class="img-fluid rounded" width="50">
                                            @else
                                            <img id="favicon-preview-image"
                                                src="{{ asset('uploads/default_user.png') }}" alt="basic_favicon"
                                                class="img-fluid rounded" width="70" />
                                            @endif
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

    <script type="text/javascript">
        // Main Logo
        $('#mainlogo-fileinput').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#main-preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        // Footer Logo
        $('#footerlogo-fileinput').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#footer-preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        // Favicon
        $('#favicon-fileinput').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#favicon-preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    </script>
    @endsection
