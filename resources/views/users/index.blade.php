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
                            <h4 class="card-text pt-1 mb-0 text-light"><i class="dripicons-user-group"></i> All User List</h4>
                            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bx bx-user-plus"></i> Add User</a>
                        </div>
                        <div class="card-body">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                            role="grid" aria-describedby="datatable_info" style="width: 1016px;">
                                            <thead>
                                                <tr role="row">
                                                    <th rowspan="1" colspan="1" style="width: 152px;">User Name</th>
                                                    <th rowspan="1" colspan="1" style="width: 200px;">Email</th>
                                                    <th rowspan="1" colspan="1" style="width: 115px;">Phone</th>
                                                    <th rowspan="1" colspan="1" style="width: 55px;">Role</th>
                                                    <th rowspan="1" colspan="1" style="width: 108px;">Stauts</th>
                                                    <th rowspan="1" colspan="1" style="width: 89px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allusers as $data)
                                                <tr>
                                                    <td>{{ $data['name'] }}</td>
                                                    <td>{{ $data['email'] }}</td>
                                                    <td>{{ $data['phone'] }}</td>
                                                    <td>{{ $data['role'] }}</td>
                                                    <td>
                                                        @if ($data['active'])
                                                        <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                                        @else
                                                        <span class="badge badge-pill badge-soft-danger font-size-11">Desible</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupVerticalDrop1" type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Manage <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                                {{-- <a class="dropdown-item text-primary btn-link" href="{{ route('user.show',$data->slug) }}"> <i class="dripicons-preview"></i> Show</a> --}}
                                                                <a class="dropdown-item text-primary btn-link" href="{{ route('user.edit',$data->slug) }}"> <i class="dripicons-document-edit"></i> Edit</a>
                                                                <a class="dropdown-item text-primary btn-link" href="{{ route('user.destroy',$data->slug) }}"> <i class="dripicons-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @endsection
