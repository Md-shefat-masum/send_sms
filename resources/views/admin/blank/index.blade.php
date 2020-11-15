@extends('layouts.admin.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informations</h5>
                </div>
                <div class="table_content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>cell</td>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                            <td>Cell</td>
                                            <td>
                                                <ul class="d-flex justify-content-center table_action_list">
                                                    <li><a href="#"><i class="fa fa-plus"></i></a></li>
                                                    <li>
                                                        <a href="#"
                                                            class="edit_btn"
                                                            data-href="{{ route('admin_user_update') }}"
                                                            data-edit_href="{{ route('admin_user_edit') }}?id={{ $item->id }}"
                                                            data-toggle="modal" data-target="#formemodal">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="#" data-href="{{ route('admin_user_delete', $item->id) }}"
                                                            class="delete_btn" data-toggle="modal"
                                                            data-target="#modal-animation-1"><i class="fa fa-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-animation-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content animated flipInX">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Sure want to delte?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
                    <a href="" id="delete_confirm_btn" class="btn btn-danger"><i class="fa fa-check-square-o"></i> Save
                        changes</a>
                </div>
            </div>
        </div>
    </div>

    {{-- add update modal --}}
    <div class="modal fade" id="formemodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="progress-wrapper">
                        <div class="progress mb-4" style="height:5px;">
                            <div class="progress-bar form_progress_bar gradient-hossein" style="width: 0%;"></div>
                        </div>
                    </div>
                    <form action="#" id="add_update_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form_content">

                        </div>
                        <div class="form-group">
                            <button type="button" class="btn update_btn btn-light px-5"><i class="fa fa-upload"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
