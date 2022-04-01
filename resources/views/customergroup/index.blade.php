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
                                <li class="breadcrumb-item active">Customer Group</li>
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
                            <h4 class="card-text pt-1 mb-0 text-light">All Customer Group List</h4>
                            <a href="{{ route('customer.group.create') }}" class="btn btn-primary"><i class="bx bx-plus-medical"></i> Add Customer Group</a>
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
                                                    <th rowspan="1" colspan="1" style="width: 152px;">Name</th>
                                                    <th rowspan="1" colspan="1" style="width: 200px;">Remarks</th>
                                                    <th rowspan="1" colspan="1" style="width: 108px;">Stauts</th>
                                                    <th rowspan="1" colspan="1" style="width: 89px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{ $data['cg_name'] }}</td>
                                                    <td>{{ $data['cg_remarks'] }}</td>
                                                    <td>
                                                        @if ($data['cg_status'])
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
                                                                <a class="dropdown-item text-primary btn-link" href="{{ route('customer.group.edit',$data->cg_slug) }}"> <i class="dripicons-document-edit"></i> Edit</a>
                                                                <a class="dropdown-item text-primary btn-link delete-modal"
                                                                href="{{ route('customer.group.destroy',$data->cg_slug) }}"
                                                                data-bs-toggle="modal" data-value="{{ $data->cg_id }}" data-bs-target="#deleteModal" > <i class="dripicons-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="deleteModal" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-hidden="true"></button>
                                                            </div> <!-- end modal header -->
                                                            <div class="modal-body">
                                                                Do you really want to delete these records? This process cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('customer.group.destroy',$data->cg_slug) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger" name="delete_data">Yes,
                                                                        delete it</button>
                                                                </form>
                                                            </div> <!-- end modal footer -->
                                                        </div> <!-- end modal content-->
                                                    </div> <!-- end modal dialog-->
                                                </div>
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
    @include('includes.delete_alert')
    @endsection
