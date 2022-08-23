@extends('pages.parent')

@section('title','اضافة صلاحيات للمستخدم')

@section('page_name','منظومة اللجان')

@section('main_path','الصلاحيات')
@section('sub_path','اضافة صلاحيات للمستخدم')



@section('styles')
<style>
.app-toolbar {
    direction: rtl;
}

.marTopForCheckBoxes {
    margin-top: 5px;
}

.changeFontSize {
    font-size: 18px;
    margin-right: 5px;
}

.alignCards {
    display: inline-block;
    margin: 0 2% 2% 0;
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
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
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
                            <h2 style="margin-right: 5px">اضافة صلاحيات للمستخدمين</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <form action="{{route('roleUser.store')}}" method="post">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body pt-5" data-select2-id="select2-data-125-c05l">
                            <div class="row">
                                <!--begin::Input group-->
                                <div style="margin-top: 30px" class="row justify-content-between mb-5 me-auto ms-auto">
                                    <div class="mb-7 col-lg-4">
                                        <select aria-hidden="true" class="form-select w-100 ml-5 fs-3 " required name="user_id"
                                            id="">
                                            <option value="" disabled selected hidden>اسم المستخدم</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row justify-content-between mb-5 me-auto ms-auto">
                                    <div class="mb-7 col-lg-4">
                                        <select aria-hidden="true" class="form-select w-100 ml-5 fs-3 " required name="role_id"
                                            id="">
                                            <option value="" disabled selected hidden>اسم الصلاحية</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
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
            <button style="width: 10rem" type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                <span class="indicator-label fs-5 fw-bold">اعتماد الصلاحيات</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
            <!--begin::Button-->
            <button style="margin-right: 10px" type="button" data-kt-contacts-type="cancel" class="btn btn-secondary">
                <span class="indicator-label fs-5 fw-bold">الغاء</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
        </form>
        <!--end::Action buttons-->
        <!--end::Contacts App- Add New Contact-->
    </div>
    <!--end::Content container-->
</div>
@endsection

@section('scripts')
@endsection