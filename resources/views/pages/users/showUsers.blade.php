@extends('pages.parent')

@section('title','عرض المستخدمين')

@section('page_name','المستخدمين')

@section('main_path','المستخدمين')
@section('sub_path','عرض المستخدمين')


@section('styles')
    <style>
        .app-toolbar {
            direction: rtl;
        }
    </style>
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
                                <div class="card card-flush">
                                    <!--begin::Card header-->
                                    <div dir="rtl" class="card-header mt-5">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h3 class="fw-bold mb-1">معلومات المستخدين</h3>
                                            <div class="fs-6 text-gray-400">الجدول يحتوي على جميع بيانات المستخدمين
                                            </div>
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
                                                            اضافة مستخدم جديد
                                                        </button>
                                                        <div class="card-body py-3">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table
                                                                    class="table hover table-striped table-rounded table-row-bordered data-table">
                                                                    <thead>
                                                                    <tr class="fw-bold text-muted bg-light">
                                                                        <th class="min-w-50px">الاعدادات</th>
                                                                        <th class="min-w-150px">الايميل</th>
                                                                        <th class="min-w-150px">اسم الموظف</th>
                                                                        <th class="min-w-150px">اسم المستخدم</th>
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
                                                                        <!--begin::Form-->
                                                                    <form
                                                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                                        id="create_user_form">
                                                                        @csrf
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-7">
                                                                            <!--begin::Label-->
                                                                            <label class="fs-6 fw-semibold mb-3">
                                                                                <span>Add Photo</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Image input wrapper-->
                                                                            <div class="mt-1">
                                                                                <!--begin::Image placeholder-->
                                                                                <!-- <style>
                                                                                .image-input-placeholder { background-image: url( {{asset('assets/media/svg/files/blank-image.svg')}} )}

                                                                                [data-theme="dark"] .image-input-placeholder {
                                                                                    background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});}
                                                                                </style> -->
                                                                                <!--end::Image placeholder-->
                                                                                <!--begin::Image input-->
                                                                                <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty"
                                                                                    data-kt-image-input="true">
                                                                                    <!--begin::Preview existing avatar-->
                                                                                    <div
                                                                                        class="image-input-wrapper w-100px h-100px">
                                                                                    </div>
                                                                                    <!--end::Preview existing avatar-->
                                                                                    <!--begin::Edit-->
                                                                                    <label
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="change"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill fs-7"></i>
                                                                                        <!--begin::Inputs-->
                                                                                        <input id="image" name="image"
                                                                                            type="file"
                                                                                            accept=".png, .jpg, .jpeg">
                                                                                        <input type="hidden"
                                                                                            name="avatar_remove">
                                                                                        <!--end::Inputs-->
                                                                                    </label>
                                                                                    <!--end::Edit-->
                                                                                    <!--begin::Cancel-->
                                                                                    <span
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="cancel"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i class="bi bi-x fs-2"></i>
                                                                                    </span>
                                                                                    <!--end::Cancel-->
                                                                                    <!--begin::Remove-->
                                                                                    <span
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="remove"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i class="bi bi-x fs-2"></i>
                                                                                    </span>
                                                                                    <!--end::Remove-->
                                                                                </div>
                                                                                <!--end::Image input-->
                                                                            </div>
                                                                            <!--end::Image input wrapper-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Row-->
                                                                        <div
                                                                            class="row row-cols-2 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                            <!--begin::Input group-->
                                                                            <div
                                                                                class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label
                                                                                    class="fs-6 fw-semibold form-label mt-3">
                                                                                    <span class="required">Name</span>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text" name="name"
                                                                                    class="form-control form-control-solid"
                                                                                    id="name" value=""
                                                                                    placeholder="Enter Name">
                                                                                <!--end::Input-->
                                                                                <div
                                                                                    class="fv-plugins-message-container invalid-feedback">
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <!--end::Row-->
                                                                        <!--begin::Input group-->
                                                                        <div
                                                                            class="fv-row mb-7 fv-plugins-icon-container">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="fs-6 fw-semibold form-label mt-3">
                                                                                <span class="required">Email</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <input id="email" type="email" name="email"
                                                                                class="form-control form-control-solid"
                                                                                value="" placeholder="Enter Email">
                                                                            <!--end::Input-->
                                                                            <div
                                                                                class="fv-plugins-message-container invalid-feedback">
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div
                                                                            class="fv-row mb-7 fv-plugins-icon-container">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="fs-6 fw-semibold form-label mt-3">
                                                                                <span class="required">Password</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <input type="text" name="password"
                                                                                class="form-control form-control-solid"
                                                                                id="password" value=""
                                                                                placeholder="Enter Password">
                                                                            <!--end::Input-->
                                                                            <div
                                                                                class="fv-plugins-message-container invalid-feedback">
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div
                                                                            class="fv-row mb-7 fv-plugins-icon-container">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="fs-6 fw-semibold form-label mt-3">
                                                                                <span class="required">Confirm
                                                                                    Password</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <input type="text"
                                                                                name="password_confirmation"
                                                                                class="form-control form-control-solid"
                                                                                id="password_confirmation"
                                                                                placeholder="Confirm Password" value="">
                                                                            <!--end::Input-->
                                                                            <div
                                                                                class="fv-plugins-message-container invalid-feedback">
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Separator-->
                                                                        <div class="separator mb-6"></div>
                                                                        <!--end::Separator-->
                                                                        <!--begin::Action buttons-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <!--begin::Button-->
                                                                            <button type="button"
                                                                                onclick="reset('create_user_form')"
                                                                                data-kt-contacts-type="cancel"
                                                                                class="btn btn-light me-3">
                                                                                Cancel
                                                                            </button>
                                                                            <!--end::Button-->
                                                                            <!--begin::Button-->
                                                                            <button type="button" id="createBtn"
                                                                                data-kt-contacts-type="submit"
                                                                                class="btn btn-primary"
                                                                                value="create">Create User
                                                                            </button>
                                                                            <!--end::Button-->
                                                                        </div>
                                                                        <!--end::Action buttons-->
                                                                        <div></div>
                                                                    </form>
                                                                    <!--end::Form-->
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
                                                                <div class="modal-body rtl">
                                                                    <div class="card-body pt-5">
                                                                        <!--begin::Form-->
                                                                         <!--begin::Form-->
                                                                    <form
                                                                        class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                                                        id="edit_user_form">
                                                                        @csrf
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-7">
                                                                            <!--begin::Label-->
                                                                            <label class="fs-6 fw-semibold mb-3">
                                                                                <span>Edit Photo</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Image input wrapper-->
                                                                            <div class="mt-1">
                                                                                <!--begin::Image placeholder-->
                                                                                <!-- <style>.image-input-placeholder {
                    background-image: url({{asset('assets/media/svg/files/blank-image.svg')}});
                }

                [data-theme="dark"] .image-input-placeholder {
                    background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});
                }</style> -->
                                                                                <!--end::Image placeholder-->
                                                                                <!--begin::Image input-->
                                                                                <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty"
                                                                                    data-kt-image-input="true">
                                                                                    <!--begin::Preview existing avatar-->
                                                                                    <div
                                                                                        class="image-input-wrapper w-100px h-100px">
                                                                                    </div>
                                                                                    <!--end::Preview existing avatar-->
                                                                                    <!--begin::Edit-->
                                                                                    <label
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="change"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill fs-7"></i>
                                                                                        <!--begin::Inputs-->
                                                                                        <input id="editImage"
                                                                                            name="image" type="file"
                                                                                            accept=".png, .jpg, .jpeg">
                                                                                        <input type="hidden"
                                                                                            name="avatar_remove">
                                                                                        <!--end::Inputs-->
                                                                                    </label>
                                                                                    <!--end::Edit-->
                                                                                    <!--begin::Cancel-->
                                                                                    <span
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="cancel"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i class="bi bi-x fs-2"></i>
                                                                                    </span>
                                                                                    <!--end::Cancel-->
                                                                                    <!--begin::Remove-->
                                                                                    <span
                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                        data-kt-image-input-action="remove"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-kt-initialized="1">
                                                                                        <i class="bi bi-x fs-2"></i>
                                                                                    </span>
                                                                                    <!--end::Remove-->
                                                                                </div>
                                                                                <!--end::Image input-->
                                                                            </div>
                                                                            <!--end::Image input wrapper-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Row-->
                                                                        <div
                                                                            class="row row-cols-2 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                                            <!--begin::Input group-->
                                                                            <div
                                                                                class="fv-row mb-7 fv-plugins-icon-container">
                                                                                <!--begin::Label-->
                                                                                <label
                                                                                    class="fs-6 fw-semibold form-label mt-3">
                                                                                    <span class="required">New
                                                                                        Name</span>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text" name="name"
                                                                                    class="form-control form-control-solid"
                                                                                    id="editName" value=""
                                                                                    placeholder="Enter New Name">
                                                                                <!--end::Input-->
                                                                                <div
                                                                                    class="fv-plugins-message-container invalid-feedback">
                                                                                </div>
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <!--end::Row-->
                                                                        <!--begin::Input group-->
                                                                        <div
                                                                            class="fv-row mb-7 fv-plugins-icon-container">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="fs-6 fw-semibold form-label mt-3">
                                                                                <span class="required">New Email</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <input id="editEmail" type="email"
                                                                                name="email"
                                                                                class="form-control form-control-solid"
                                                                                value="" placeholder="Enter New Email">
                                                                            <!--end::Input-->
                                                                            <div
                                                                                class="fv-plugins-message-container invalid-feedback">
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Separator-->
                                                                        <div class="separator mb-6"></div>
                                                                        <!--end::Separator-->
                                                                        <!--begin::Action buttons-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <!--begin::Button-->
                                                                            <button type="button"
                                                                                onclick="reset('edit_user_form')"
                                                                                data-kt-contacts-type="cancel"
                                                                                class="btn btn-light me-3">
                                                                                Cancel
                                                                            </button>
                                                                            <!--end::Button-->
                                                                            <!--begin::Button-->
                                                                            <button type="button" id="editBtn"
                                                                                data-kt-contacts-type="submit"
                                                                                class="btn btn-primary"
                                                                                value="create">Edit User
                                                                            </button>
                                                                            <!--end::Button-->
                                                                        </div>
                                                                        <!--end::Action buttons-->
                                                                        <div></div>
                                                                    </form>
                                                                    <!--end::Form-->
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
                    {data: 'settings', className: 'dt-center', orderable: false, searchable: false},
                    {data: 'email', className: 'dt-center'},
                    {data: 'employeeName', className: 'dt-center'},
                    {data: 'name', className: 'dt-center'},
                ]
            });
            $('.data-table').DataTable().columns.adjust();
        });

        //add user
        $('#createNewUser').click(function () {
            $('#createBtn').html('انشاء مستخدم');
            $('#create_user_form').trigger("reset");
            $('#modelHeadingForCreateForm').html("انشاء مستخدم جديد");
            $('#ajaxModelForCreateUser').modal('show');
        });

        $('#createBtn').click(function (e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('employeeName', document.getElementById('employeeName').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('password_confirmation', document.getElementById('password_confirmation').value);

            // let data = $('#create_user_form').serialize();

            console.log(formData);
            let formId = 'create_user_form';
            let ajaxModalId = 'ajaxModelForCreateUser';
            let modalId = 'exampleModalCenter';
            let datatableClass = '.data-table';
            let buttonId = 'createBtn';

            store('/addUser', formData, formId, modalId, ajaxModalId, datatableClass, buttonId);
        });


        let user_id;
        //edit user
        $('body').on('click', '.editUser', function () {
            user_id = $(this).data('id');
            $.get("{{ url('/updateUser') }}" + '/' + user_id , function (data) {
                $('#editBtn').html("Edit User");
                $('#modelHeadingForEditForm').html("Edit User");
                $('#ajaxModelForEditUser').modal('show');
                $('#editName').val(data.name);
                $('#editEmployeeName').val(data.employeeName);
                $('#editEmail').val(data.email);
            })
        });

        $('#editBtn').click(function (e) {
            e.preventDefault();
            let url = 'updateUser' + user_id ;

            let formData = new FormData();
            formData.append('name', document.getElementById('editName').value);
            formData.append('employeeName', document.getElementById('editEmployeeName').value);
            formData.append('email', document.getElementById('editEmail').value);

            let formId = 'edit_user_form';
            let ajaxModalId = 'ajaxModelForEditUser';
            let modalId = 'exampleModalCenter';
            let datatableClass = '.data-table';
            let buttonId = 'editBtn';
            update(url, formData, user_id, formId, modalId, ajaxModalId, datatableClass, buttonId);
        });


        //delete user
        $('body').on('click', '.deleteUser', function () {
            let user_id = $(this).data("id");
            confirmDestroy('/user/users/delete', user_id, '.data-table');
        });

    </script>

@endsection
