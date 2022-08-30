@extends('pages.parent')

@section('page_name','المستخدمين')

@section('main_path','المستخدمين')
@section('sub_path','عرض المستخدمين')


@section('styles')

@endsection

@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::Engage widget 10-->
                            <div style="background-color: inherit" class="card card-flush h-md-100">
                                <!--begin::Body-->
                                <div class="card card-flush mt-6 mt-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header mt-5">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h3 class="fw-bold mb-1">Users Information</h3>
                                            <div class="fs-6 text-gray-400">all users data from User table</div>
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar my-1" data-select2-id="select2-data-159-eyt2">
                                        </div>
                                        <!--begin::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <div id="kt_profile_overview_table_wrapper"
                                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="table-responsive">
                                                    <div class="container">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
                                                                data-toggle="modal" data-target="#exampleModalCenter"
                                                                id="createNewUser">
                                                            Add New User
                                                        </button>
                                                        <div class="card-body py-3">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table
                                                                    class="table hover table-striped table-rounded table-row-bordered data-table">
                                                                    <thead>
                                                                    <tr class="fw-bold text-muted bg-light">
                                                                        <th style="padding-left: 20px"
                                                                            class="min-w-10px">
                                                                            Agent
                                                                        </th>
                                                                        <th class="min-w-150px">name</th>
                                                                        <th class="min-w-150px">email</th>
                                                                        {{--                                                                        <th class="min-w-100px">created_at</th>--}}
                                                                        {{--                                                                        <th class="min-w-100px">updated_at</th>--}}
                                                                        <th class="min-w-50px">settings</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            <!--end::Table container-->
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ajaxModelForCreateUser" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-size: 25px" class="modal-title"
                                                                        id="modelHeadingForCreateForm">
                                                                    </h5>
                                                                    <div
                                                                        class="btn btn-sm btn-icon btn-active-color-primary close"
                                                                        data-bs-dismiss="modal">
                                                                        <button
                                                                            style="background-color: inherit;border: 0"
                                                                            type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <div
                                                                                class="btn btn-sm btn-icon btn-active-color-primary"
                                                                                data-bs-dismiss="modal">
                                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                                <span class="svg-icon svg-icon-1"><svg
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"><rect
                                                                                            opacity="0.5" x="6"
                                                                                            y="17.3137"
                                                                                            width="16" height="2" rx="1"
                                                                                            transform="rotate(-45 6 17.3137)"
                                                                                            fill="currentColor"></rect><rect
                                                                                            x="7.41422" y="6" width="16"
                                                                                            height="2" rx="1"
                                                                                            transform="rotate(45 7.41422 6)"
                                                                                            fill="currentColor"></rect></svg>
                                                                                 </span>
                                                                                <!--end::Svg Icon-->
                                                                            </div>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body pt-5">
                                                                        <!--begin::Form-->
                                                                       {{-- @include('../forms/users/create-user')--}}
                                                                        <!--end::Form-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ajaxModelForEditUser" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-size: 25px" class="modal-title"
                                                                        id="modelHeadingForEditForm">
                                                                    </h5>
                                                                    <div
                                                                        class="btn btn-sm btn-icon btn-active-color-primary close"
                                                                        data-bs-dismiss="modal">
                                                                        <button
                                                                            style="background-color: inherit;border: 0"
                                                                            type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <div
                                                                                class="btn btn-sm btn-icon btn-active-color-primary"
                                                                                data-bs-dismiss="modal">
                                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                                <span class="svg-icon svg-icon-1"><svg
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"><rect
                                                                                            opacity="0.5" x="6"
                                                                                            y="17.3137"
                                                                                            width="16" height="2" rx="1"
                                                                                            transform="rotate(-45 6 17.3137)"
                                                                                            fill="currentColor"></rect><rect
                                                                                            x="7.41422" y="6" width="16"
                                                                                            height="2" rx="1"
                                                                                            transform="rotate(45 7.41422 6)"
                                                                                            fill="currentColor"></rect></svg>
                                                                                 </span>
                                                                                <!--end::Svg Icon-->
                                                                            </div>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body pt-5">
                                                                        <!--begin::Form-->
                                                                       {{-- @include('../forms/users/edit-user')--}}
                                                                        <!--end::Form-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--end:::Main-->

@endsection

@section('scripts')

    <script>

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('showUsers') }}",
                columns: [
                    {data: 'image', className: 'dt-center', orderable: false, searchable: false},
                    {data: 'name', className: 'dt-center'},
                    {data: 'email', className: 'dt-center'},
                    // {data: 'created_at', name: 'created_at'},
                    // {data: 'updated_at', name: 'updated_at'},
                    {data: 'settings', className: 'dt-center', orderable: false, searchable: false},
                ]
            });
            $('.data-table').DataTable().columns.adjust();
        });

        //add user
        $('#createNewUser').click(function () {
            $('#createBtn').html('Create User');
            $('#create_user_form').trigger("reset");
            $('#modelHeadingForCreateForm').html("Create New User");
            $('#ajaxModelForCreateUser').modal('show');
        });

        $('#createBtn').click(function (e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('password', document.getElementById('password').value);
            formData.append('password_confirmation', document.getElementById('password_confirmation').value);

            // let data = $('#create_user_form').serialize();

            console.log(formData);
            let formId = 'create_user_form';
            let ajaxModalId = 'ajaxModelForCreateUser';
            let modalId = 'exampleModalCenter';
            let datatableClass = '.data-table';
            let buttonId = 'createBtn';

            store('/user/users', formData, formId, modalId, ajaxModalId, datatableClass, buttonId);
        });


        let user_id;
        //edit user
        $('body').on('click', '.editBook', function () {
            user_id = $(this).data('id');
            $.get("{{ url('/user/users') }}" + '/' + user_id + '/edit', function (data) {
                $('#editBtn').html("Edit User");
                $('#modelHeadingForEditForm').html("Edit User");
                $('#ajaxModelForEditUser').modal('show');
                $('#editName').val(data.name);
                $('#editEmail').val(data.email);
            })
        });

        $('#editBtn').click(function (e) {
            e.preventDefault();
            let url = '/user/users/' + user_id + '/edit';

            let formData = new FormData();
            formData.append('name', document.getElementById('editName').value);
            formData.append('email', document.getElementById('editEmail').value);
            formData.append('image', document.getElementById('editImage').files[0]);

            let formId = 'edit_user_form';
            let ajaxModalId = 'ajaxModelForEditUser';
            let modalId = 'exampleModalCenter';
            let datatableClass = '.data-table';
            let buttonId = 'editBtn';
            update(url, formData, user_id, formId, modalId, ajaxModalId, datatableClass, buttonId);
        });


        //delete user
        $('body').on('click', '.deleteBook', function () {
            let user_id = $(this).data("id");
            confirmDestroy('/user/users/delete', user_id, '.data-table');
        });

    </script>

@endsection