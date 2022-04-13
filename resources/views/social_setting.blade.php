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
                                <li class="breadcrumb-item active">Social Media</li>
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
                            <h4 class="pt-1 mb-0 text-light">Social Media Setting</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('social.setting.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="sm_id" value="{{ $data->sm_id}}">
                                <div class="row mb-3 mt-3">
                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-facebook-circle"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_facebook') is-invalid @enderror"
                                                placeholder="facebook url" name="sm_facebook"
                                                value="{{ $data->sm_facebook }}">
                                            @error('sm_facebook')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-twitter"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_twitter') is-invalid @enderror"
                                                placeholder="twitter url" name="sm_twitter"
                                                value="{{ $data->sm_twitter }}">
                                            @error('sm_twitter')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class=" bx bxl-linkedin-square"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_linkedin') is-invalid @enderror"
                                                placeholder="linkedin url" name="sm_linkedin"
                                                value="{{ $data->sm_linkedin }}">
                                            @error('sm_linkedin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-dribbble"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_dribbble') is-invalid @enderror"
                                                placeholder="dribbble url" name="sm_dribbble"
                                                value="{{ $data->sm_dribbble }}">
                                            @error('sm_dribbble')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-youtube"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_youtube') is-invalid @enderror"
                                                placeholder="youtube url" name="sm_youtube"
                                                value="{{ $data->sm_youtube }}">
                                            @error('sm_youtube')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-slack"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_slack') is-invalid @enderror"
                                                placeholder="slack url" name="sm_slack" value="{{ $data->sm_slack }}">
                                            @error('sm_slack')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-instagram-alt"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_instagram') is-invalid @enderror"
                                                placeholder="instagram url" name="sm_instagram"
                                                value="{{ $data->sm_instagram }}">
                                            @error('sm_instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-behance"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_behance') is-invalid @enderror"
                                                placeholder="behance url" name="sm_behance"
                                                value="{{ $data->sm_behance }}">
                                            @error('sm_behance')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-google"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_google') is-invalid @enderror"
                                                placeholder="google url" name="sm_google"
                                                value="{{ $data->sm_google }}">
                                            @error('sm_google')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bx bxl-reddit"></i></span>
                                            <input type="text"
                                                class="form-control @error('sm_raddit') is-invalid @enderror"
                                                placeholder="raddit url" name="sm_raddit"
                                                value="{{ $data->sm_raddit }}">
                                            @error('sm_raddit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="col col-lg-2">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="uil-sync me-1"></i>
                                                <span>Update</span> </button>
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
