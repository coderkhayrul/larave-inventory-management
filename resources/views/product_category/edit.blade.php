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
                                <li class="breadcrumb-item active">Product Category</li>
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
                            <h4 class="pt-1 mb-0 text-light">Edit Category</h4>
                            <a href="{{ route('product.category.index') }}" class="btn btn-primary btn-sm">All Product Category</a>
                        </div>

                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with <span class="text-danger">*</span> are required input fields.</small>
                            </p>
                            <form method="POST" action="{{ route('product.category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                            <input type="text" name="pc_name" class="form-control @error('pc_name') is-invalid @enderror" value="{{ $data['pc_name'] }}">
                                            @error('pc_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            @php
                                                $pro_category = App\Models\ProductCategory::where('pc_status', 1)->get()
                                            @endphp
                                            <label><strong>Parent Category <span class="text-danger">*</span></strong> </label>
                                            <div class="input-group">
                                                <select class="form-select @error('pc_parent') is-invalid @enderror" value="{{ old('pc_parent') }}" name="pc_parent">
                                                    <option value="0">No Parent Category</option>
                                                    @foreach ($pro_category as $category)
                                                    <option value="{{ $category->pc_id }}">{{ $category->pc_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pc_parent')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Image</strong></label>
                                            <input id="user-fileinput" type="file" name="pc_image"
                                                class="form-control @error('pc_image') is-invalid @enderror" value="{{ old('pc_image') }}">
                                            @error('pc_image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <img id="preview-image" class="rounded avatar-lg" src="{{ asset('uploads/product/category/' . $data->pc_image) }}" alt="">
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
