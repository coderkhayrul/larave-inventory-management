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
                                <li class="breadcrumb-item active">Users</li>
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
                            <h4 class="pt-1 mb-0 text-light">Edit User</h4>
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">All User</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('user.update',$data->slug) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>UserName <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data['name'] }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Phone Number <span class="text-danger">*</span></strong></label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $data['phone'] }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>User Image</strong></label>
                                            <input  id="user-fileinput" type="file" name="photo" class="form-control">
                                        </div>
                                        <div class="form-group pb-2">
                                            <input class="mt-2" type="checkbox" name="active" value="1"  {{ $data->active == 1 ? 'checked' : '' }} >
                                            <label class="mt-2"><strong>Active</strong></label>
                                        </div>
                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Email <span class="text-danger">*</span></strong></label>
                                            <input type="email" name="email" placeholder="example@example.com"
                                                class="form-control @error('email') is-invalid @enderror" value="{{ $data['email'] }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-3">
                                            <label><strong>Role <span class="text-danger">*</span></strong></label>
                                            <select class="form-select @error('role') is-invalid @enderror" name="role">
                                                <option disabled>Select Role</option>
                                                <option value="1" {{ $data->role == 1 ? 'selected' : '' }}>Admin</option>
                                                <option value="2" {{ $data->role == 2 ? 'selected' : '' }}>Owner</option>
                                                <option value="3" {{ $data->role == 3 ? 'selected' : '' }}>customer</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            @if ($data['photo'])
                                            <img id="preview-image" class="rounded" style="width: 150px; height: 100px" src="{{ asset('uploads/user/' . $data->photo) }}" alt="user_image">
                                            @else
                                            <img id="preview-image" class="rounded" style="width: 150px; height: 100px" src="{{ asset('uploads/default_user.png') }}" alt="user_image">
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
        $('#user-fileinput').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    @endsection
