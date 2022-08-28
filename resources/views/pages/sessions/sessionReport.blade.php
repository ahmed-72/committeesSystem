@extends('pages.parent')

@section('title','انشاء محضر')

@section('page_name','منظومة اللجان')

@section('main_path','الجلسات')
@section('sub_path','انشاء محضر')



@section('styles')

<style>
th,
td {
    border: solid gray 1px;
    text-align: center;
}

input.readonly {
    min-width: 20px;
    text-align: center;
    border: none;
}

.app-toolbar {
    direction: rtl;
}

.form span {
    font-size: 18px;
}

.noEditing:hover {
    cursor: not-allowed;
}
</style>

@endsection

@section('content')
@if($notReady==1)
<h3 class="alert alert-danger col-6">هذه الجلسة لم يحن وقتها بعد</h3>
<div class="mb-0">
    <a href="{{route('mainhome')}}" class="btn btn-sm btn-primary">عودة للصفحة الرئيسية</a>
    <a href="{{ url()->previous()}}" class="btn btn-sm btn-primary">عودة للصفحة السابقة</a>
</div>
@else
@if($errors->any())
<ul class="alert alert-danger col-6">
    @foreach($errors->all() as $message)
    <li>{{$message}}</li>
    @endforeach
</ul>
@endif

<!--begin::Main-->
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
                            <h2 style="margin-right: 5px">انشاء محضر</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" data-select2-id="select2-data-125-c05l">
                        <!--begin::Form-->
                        <form action="{{route('sessionReport.store')}}" id="form" method="POST"
                            class="col-xl-12 form fv-plugins-bootstrap5 fv-plugins-framework"
                            data-select2-id="select2-data-kt_ecommerce_settings_general_form">
                            @csrf

                            <!--begin::Row-->
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-3">
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label for="commName" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="">رقم الجلسة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input readonly type="text" class="form-control form-control-solid noEditing"
                                            name="sessionID" id="" value="{{$session->sessionID}}">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="commNumber" class="fs-6 fw-semibold form-label mt-3">
                                            <span>اسم اللجنة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input readonly type="text" class="noEditing form-control form-control-solid"
                                            name="committeeName" id="" value="{{$session->committee->committeeName}}">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label for="commDate" class="fs-6 fw-semibold form-label mt-3">
                                            <span>رقم اللجنة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input readonly class="noEditing form-control form-control-solid"
                                            name="committeeID" id="" value="{{$session->committee->committeeID}}">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <hr>
                            <br><br><br>


                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">سجل المتابعة</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed border table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr
                                                    class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                                    <th>م.</th>
                                                    <th>الاسم</th>
                                                    <th>التوصيف</th>
                                                    <th>الحضور</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @foreach($members as $member)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <input type="text" name="memberID[]" 
                                                                    class="text-dark fw-bold text-hover-primary  fs-6" style="width:30px ;"
                                                                    readonly value="{{$member->memberID}}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark fw-bold text-hover-primary d-block fs-6">{{$member->employee->employeeName}}</a>
                                                        <span
                                                            class="text-muted fw-semibold text-muted d-block fs-7">{{$member->employee->employeeDepartment}}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column w-100 me-2">
                                                            <span
                                                                class="fw-bold">{{$member->employee->employeeJobTitle}}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="align-items-center">
                                                            <div style="display: inline-block"
                                                                class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="radio" required
                                                                    name="attendee[{{$member->memberID}}]"
                                                                    value="attendant" id="flexCheckboxLg" />
                                                                <label class="form-check-label" for="flexCheckboxLg">
                                                                    حاضر
                                                                </label>
                                                            </div>

                                                            <div style="display: inline-block;margin-right: 15px"
                                                                class="form-check form-check-custom form-check-danger form-check-solid">
                                                                <input class="form-check-input" type="radio"
                                                                    name="attendee[{{$member->memberID}}]"
                                                                    value="absent" id="flexCheckboxSm" />
                                                                <label class="form-check-label" for="flexCheckboxSm">
                                                                    متغيب
                                                                </label>
                                                            </div>

                                                            <div style="display: inline-block;margin-right: 15px"
                                                                class="form-check form-check-custom form-check-warning form-check-solid">
                                                                <input class="form-check-input" type="radio"
                                                                    name="attendee[{{$member->memberID}}]"
                                                                    value="apologized" id="flexRadioLg" />
                                                                <label class="form-check-label" for="flexRadioLg">
                                                                    معتذر
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>

                            @foreach($topics as $topic)
                            <div style="width: auto" class="col-lg-10 border">
                                <!--begin::Engage widget 10-->
                                <div class="card card-flush h-md-100">
                                    <!--begin::Body-->
                                    <div class="card-header">
                                        <!--begin::Card header-->
                                        <div class="card-title fs-3 fw-bold">رقم/<input type="text" size="1"
                                                name="topicID[{{$topic->discussiontopic_topicID}}]" class="readonly"
                                                readonly value="{{$topic->discussiontopic_topicID}}"> 
                                            {{$topicDetails[$topic->discussiontopic_topicID][0]->topicDescription}}<br>{{$topicDetails[$topic->discussiontopic_topicID][0]->ResolutionDescription}}
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div style="margin-top: -30px" class="py-5">
                                        <div class="rounded p-10">
                                            <!--begin::Input group-->
                                            <div class="input-group">
                                                <span class="input-group-text">المداولات</span>
                                                <textarea rows="2" style="margin-right: 10px" class="form-control" required
                                                    name="deliberation[{{$topic->discussiontopic_topicID}}]"
                                                    aria-label="With textarea"></textarea>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Row-->
                                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2"
                                                data-select2-id="select2-data-124-mft4">

                                                <!--begin::Col-->
                                                <div class="col" data-select2-id="select2-data-123-3nqq">
                                                    <div class="mt-3">
                                                        <div class="repeater">
                                                            <div data-repeater-list="decisionsGroup[{{$topic->discussiontopic_topicID}}]">
                                                                <div data-repeater-item>
                                                                    <div style="width: 1400px" class="form-row mt-3"
                                                                        id="members">
                                                                        <input type="hidden" name="cat-id" id="member-id" />

                                                                        <div style="display: inline-block"
                                                                            class=" col-sm-3">
                                                                            <!--begin::Input group-->
                                                                            <div class="input-group">
                                                                                <span
                                                                                    class="input-group-text">القرارات</span>
                                                                                <textarea rows="2" required
                                                                                    style="margin-right: 10px"
                                                                                    class="form-control"
                                                                                    name="decision[ ]"
                                                                                    aria-label="With textarea"></textarea>
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <div style="display: inline-block"
                                                                            class=" col-sm-2">
                                                                            
                                                                            <select aria-hidden="true" class="form-select w-100 ml-5 fs-5 " name="executionDepartment[ ]"required
                                                                                id="">
                                                                                <option value="" disabled selected hidden>جهة التنفيذ</option>
                                                                                @foreach($employees as $employee)
                                                                                <option value="{{$employee->employeeDepartment}}">{{$employee->employeeDepartment}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            style="display: inline-block;margin-left: 7px">
                                                                            <input placeholder="اجل التنفيذ" required
                                                                                class="form-control  ml-1" type="text"
                                                                                name="executionDeadline[ ]"
                                                                                id="">
                                                                        </div>
                                                                        <div style="display: inline-block"
                                                                            class=" col-sm-2 " id="colo">
                                                                            <a data-repeater-delete
                                                                                class="btn btn-sm btn-light-danger">
                                                                                <i class="la la-trash-o">حذف</i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <a data-repeater-create class="btn btn-light-primary">
                                                                <svg style="margin-left: 5px"
                                                                    xmlns="http://www.w3.org/2000/svg" width="25"
                                                                    height="25" fill="currentColor"
                                                                    class="bi bi-journal-plus" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z">
                                                                    </path>
                                                                    <path
                                                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z">
                                                                    </path>
                                                                    <path
                                                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z">
                                                                    </path>
                                                                </svg>
                                                                اضف قرار جديد
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Col-->

                                            </div>
                                            <!--end::Row-->


                                            <!--begin::Row-->
                                            <div style="margin-top: 30px"
                                                class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2"
                                                data-select2-id="select2-data-124-mft4">
                                                <!--begin::Col-->
                                                <div class="col" data-select2-id="select2-data-123-3nqq">
                                                    <div class="mt-3">
                                                        <!--begin::Input group-->
                                                        <div class="input-group">
                                                            <span class="input-group-text">الحالة</span>
                                                            <div style="margin: 15px 15px 0 0"
                                                                class="align-items-center">
                                                                <div style="display: inline-block"
                                                                    class="form-check form-check-custom form-check-success form-check-solid">
                                                                    <input class="form-check-input" type="radio" required
                                                                        name="tracking[{{$topic->discussiontopic_topicID}}]"
                                                                        value="done" id="flexCheckboxLg">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckboxLg">
                                                                        انجزت
                                                                    </label>
                                                                </div>

                                                                <div style="display: inline-block;margin-right: 15px"
                                                                    class="form-check form-check-custom form-check-danger form-check-solid">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tracking[{{$topic->discussiontopic_topicID}}]"
                                                                        value="delayed" id="flexCheckboxSm">
                                                                    <label class="form-check-label"
                                                                        for="flexCheckboxSm">
                                                                        تأجيل
                                                                    </label>
                                                                </div>

                                                                <div style="display: inline-block;margin-right: 15px"
                                                                    class="form-check form-check-custom form-check-warning form-check-solid">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tracking[{{$topic->discussiontopic_topicID}}]"
                                                                        value="tracking" id="flexRadioLg">
                                                                    <label class="form-check-label" for="flexRadioLg">
                                                                        متابعة
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Engage widget 10-->
                            </div>
                            @endforeach
                            <!--begin::Action buttons-->
                            <div class="d-flex justify-content-end mt-7">
                                <!--begin::Button-->
                                <button style="width: 10rem" type="submit" data-kt-contacts-type="submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label fs-5 fw-bold">انشاء المحضر</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button style="margin-right: 10px" type="submit" data-kt-contacts-type="submit"
                                    class="btn btn-secondary">
                                    <span class="indicator-label fs-5 fw-bold">رجوع</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Action buttons-->
                        </form>

                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts App- Add New Contact-->
    </div>
    <!--end::Content container-->
</div>
<!--end:::Main-->
@endif
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>
@include('includes.myscripts')
<script>
$(document).ready(function() {
    'use strict';
    window.id = 1;
    $('.repeater').repeater({
        defaultValues: {
            'id': window.id,
        },
        show: function() {
            $(this).slideDown();
            console.log($(this).find('input')[1]);
            $('#cat-id').val(window.id);
        },
        hide: function(deleteElement) {
            Swal.fire({
                title: 'هل أنت متأكد ؟',
                text: "!! لا يمكنك الرجوع بعد اجراء هذه العملية",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d76e3',
                cancelButtonColor: '#da0000',
                confirmButtonText: 'نعم احذف',
                cancelButtonText: 'الغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.id--;
                    $('#cat-id').val(window.id);
                    $(this).slideUp(deleteElement);
                    console.log($('.repeater').repeaterVal());
                    Swal.fire({
                        position: 'center',
                        text: 'تم الحذف بنجاح',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            })
        },
    });
});
</script>
@endsection