@extends('pages.parent')

@section('title','عرض صلاحيات المستخدمين')

@section('page_name','منظومة اللجان')

@section('main_path','الصلاحيات')
@section('sub_path','عرض صلاحيات المستخدمين')



@section('styles')
<style>
.app-toolbar {
    direction: rtl;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    display: inline-block;
    margin-top: 5px;
}
</style>
@endsection

@section('content')

<div dir="rtl" id="kt_app_content" class="app-content flex-column-fluid" data-select2-id="select2-data-kt_app_content">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Contacts App- Add New Contact-->
        <div class="row g-7" data-select2-id="select2-data-127-s6zt">
            <!--begin::Content-->
            <div class="col-xl-12" data-select2-id="select2-data-126-xy7q">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main"
                    data-select2-id="select2-data-kt_contacts_main">
                    <!--begin::Card header-->
                    <div style="margin-bottom: 30px" class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-1 me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.3"
                                        d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <h2 style="margin-right: 5px">عرض صلاحيات المستخدمين</h2>
                        </div>
                        <div class="d-flex justify-content-end mt-7">
                            <!--begin::Button-->
                            <a style="font-size: 18px" href="{{route('roleUser.create')}}"
                                class="fonts btn btn-sm btn-primary me-2">اضافة صلاحية</a>
                            <!--end::Button-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" data-select2-id="select2-data-125-c05l">
                        <div class="table-responsive">
                            <table class="table table-hover table-rounded table-striped border gy-5 gs-5">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th style="font-size: 20px;width: 20%">اسم المستخدم</th>
                                        <th style="font-size: 20px;width: 40%">الصلاحيات</th>
                                        <!-- <th style="font-size: 20px;width: 20%">الاعدادات</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roleUsers as $role)
                                    <tr>
                                        <td style="font-size: 16px">{{$role->user->name}}</td>
                                        <td style="font-size: 16px" class="">
                                            {{$role->role->name}}</td>
                                        <!-- <td>
                                            <a href="#" class="btn btn-icon btn-success"><span
                                                    class="svg-icon svg-icon-1">
                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!- -end::Svg Icon- ->
                                                </span>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-danger"><span
                                                    class="svg-icon svg-icon-1">
                                                    <i class="fonticon-trash-bin fs-1"></i>
                                                </span>
                                            </a>
                                        </td> -->
                                    </tr>
@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Action buttons-->
        <div class="d-flex justify-content-end mt-7">
            <!--begin::Button-->
            <button style="margin-right: 10px" type="button" data-kt-contacts-type="cancel" class="btn btn-secondary">
                <span class="indicator-label fs-5 fw-bold">رجوع</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
        <!--end::Action buttons-->
        <!--end::Contacts App- Add New Contact-->
    </div>
    <!--end::Content container-->
</div>
@endsection

@section('scripts')
@endsection