@extends('pages.parent')

@section('title','انشاء لجنة')

@section('page_name','منظومة اللجان')

@section('main_path','اللجان')
@section('sub_path','انشاء لجنة')



@section('styles')

<style>
.app-toolbar {
    direction: rtl;
}

.form span {
    font-size: 20px;
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
                            <h2 style="margin-right: 5px">انشاء لجنة جديدة</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" data-select2-id="select2-data-125-c05l">
                        <!--begin::Form-->
                        <br>
                        {{--action="{{route('committees.store')}}" method="post"--}}
                        <form id="createCommitteeForm" class="col-xl-12 form fv-plugins-bootstrap5 fv-plugins-framework"
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
                                            <span class="">اسم اللجنة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="commName"
                                            id="commName">
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
                                            <span>رقم اللجنة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="commNumber"
                                            id="commNumber">
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
                                            <span>تاريخ اصدار قرار انشاء اللجنة</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" name="commDate"
                                            id="commDate">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <hr>
                            <br><br><br>
                            <!--begin::Row-->
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2"
                                data-select2-id="select2-data-124-mft4">
                                <!--begin::Col-->
                                <div class="col" data-select2-id="select2-data-123-3nqq">
                                    <div class="mt-3">
                                        <label for="commMembers"><span class="">أعضاء اللجنة</span></label>
                                    </div>
                                    <div class="mt-3">
                                        <div class="repeater">
                                            <div data-repeater-list="category-group">
                                                <div data-repeater-item>
                                                    <div style="width: 1400px" class="form-row mt-3" id="members">
                                                        <input type="hidden" name="id" id="member-id" />

                                                        <div style="display: inline-block" class=" col-sm-3">
                                                            <select id="empName"
                                                                data-dropdown-parent="#modal_element_id" tabindex="-1"
                                                                class="form-select" data-control="select2"
                                                                data-placeholder="اختر اسم العضو">
                                                                <option>اختر اسم العضو</option>
                                                                @foreach(\App\Models\Employee::all() as $employee)
                                                                <option value="{{$employee->employeeName}}">
                                                                    {{$employee->employeeName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div style="display: inline-block" class=" col-sm-2">
                                                            <input disabled placeholder="المسمى"
                                                                class="form-control  ml-1" type="text"
                                                                name="memberJobTitel" id="memberJobTitel">
                                                            <script>
                                                            // console.log(document.getElementById('empName').value);
                                                            // {
                                                            //     {
                                                            //         --
                                                            //         const select = {
                                                            //             {
                                                            //                 \App\ Models\ Employee::query() - >
                                                            //                     where('employeeName',
                                                            //                         'Wyman Barton') - > get(
                                                            //                         'employeeJobTitle')
                                                            //             }
                                                            //         };
                                                            //         --
                                                            //     }
                                                            // }
                                                            // select.addEventListener('change', function handleChange(event) {
                                                            //     console.log(event.target.value);
                                                            //     document.getElementById('memberJobTitel').value = event.target.value;
                                                            // });
                                                            </script>
                                                        </div>
                                                        <div style="display: inline-block;margin-left: 7px">
                                                            <select aria-hidden="true" class="form-select w-auto ml-5"
                                                                name="memberDescription" id="memberDescription">
                                                                <option value="" selected>اختر الوصف</option>
                                                                <option value="CommitteeChairman">رئيس اللجنة</option>
                                                                <option value="CommitteeViceChairman">نائب رئيس اللجنة
                                                                </option>
                                                                <option value="CommitteeSecretary">أمين سر اللجنة
                                                                </option>
                                                                <option value="CommitteeMember">عضو لجنة</option>
                                                            </select>
                                                        </div>
                                                        <div style="display: inline-block" class=" col-sm-2 " id="colo">
                                                            <a data-repeater-delete class="btn btn-sm btn-light-danger">
                                                                <i class="la la-trash-o"></i> حذف
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <a data-repeater-create class="btn btn-light-primary">
                                                <i class="la la-plus"></i>اضافة عضو
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <hr>
                            <br><br><br>
                            <!-- begin tasks -->
                            <div class="repeater mt-2" id="tasks">

                                <label for="Tasks"><span class="">مهام اللجنة</span></label>

                                <div data-repeater-list="category-group">
                                    <div data-repeater-item>
                                        <div style="width: 1500px" class="form-row mt-3">
                                            <input type="hidden" name="id" id="taskID" />
                                            <div style="display: inline-block" class=" col-sm-4">
                                                <input placeholder="وصف المهمة" class="form-control ml-2" type="text"
                                                    name="a" id="a">
                                            </div>
                                            <div style="display: inline-block" class=" col-sm-2 " id="colo">
                                                <a data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o"></i> حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a data-repeater-create class="btn btn-light-primary">
                                    <i class="la la-plus"></i>اضافة مهمة
                                </a>
                            </div>
                            <!-- end tasks -->
                            <hr>
                            <br><br><br>
                            <!-- begin tasks -->
                            <div class="repeater mt-2" id="regulations">

                                <label for="Tasks"><span class="">ضوابط اللجنة</span></label>

                                <div data-repeater-list="category-group">
                                    <div data-repeater-item>
                                        <div style="width: 1500px" class="form-row mt-3">
                                            <input type="hidden" name="id" id="regulationID" />
                                            <div style="display: inline-block" class=" col-sm-4">
                                                <input placeholder="وصف الضابط" class="form-control ml-2" type="text"
                                                    name="a" id="a">
                                            </div>
                                            <div style="display: inline-block" class=" col-sm-2 " id="colo">
                                                <a data-repeater-delete class="btn btn-sm btn-light-danger">
                                                    <i class="la la-trash-o"></i> حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a data-repeater-create class="btn btn-light-primary">
                                    <i class="la la-plus"></i>اضافة ضابط
                                </a>
                            </div>
                            <!-- end tasks -->
                            <hr>
                            <br><br><br>


                            <!-- start Regularity -->
                            <div class="form-row mt-2">
                                <div class="col-md-5 mb-5 ">
                                    <label for="isRegular"><span class="">هل اللجنة لها جلسات دورية ؟</span></label>
                                </div>
                                <br>

                                <div style="display: inline-block"
                                    class="form-check form-check-custom form-check-solid me-10">
                                    <input type="radio" id="Regular" value="1" name="isRegular"
                                        class="form-check-input h-30px w-30px" />
                                    <label class="form-check-label" for="Regular">
                                        <span class="">نعم</span>
                                    </label>
                                </div>

                                <div style="display: inline-block"
                                    class="form-check form-check-custom form-check-solid me-10">
                                    <input type="radio" id="NonRegular" value="0" name="isRegular"
                                        class="form-check-input h-30px w-30px" />
                                    <label class="form-check-label" for="NonRegular">
                                        <span class="">لا</span>
                                    </label>
                                </div>

                            </div>

                            {{--    <div class="col-xl-6 mt-2" id="hiddenNonReqular">--}}
                            {{--        <br>--}}
                            {{--        <br>--}}
                            {{--        <div class="mt-3">--}}
                            {{--            <label for="firstSessionDate"><span class="">تاريخ انعقاد الجلسة الأولى</span></label>--}}
                            {{--            <input class="form-control" type="date" name="firstSessionDate" id="firstSessionDate">--}}
                            {{--        </div>--}}
                            {{--        <br>--}}
                            {{--        <div class="mt-2">--}}
                            {{--            <label for="firstSessionTimeStart"><span class="">وقت بداية الجلسة الأولى</span></label>--}}
                            {{--            <input class="form-control" type="time" name="firstSessionTimeStart" id="firstSessionStartTime">--}}
                            {{--        </div>--}}
                            {{--        <br>--}}
                            {{--        <div class="mt-2">--}}
                            {{--            <label for="firstSessionTimeEnd"><span class="">وقت انتهاء الجلسة الأولى</span></label>--}}
                            {{--            <input class="form-control" type="time" name="firstSessionTimeEnd" id="firstSessionEndTime">--}}
                            {{--        </div>--}}
                            {{--        <br>--}}
                            {{--        <div class="mt-2 mb-4">--}}
                            {{--            <label for="firstSessionPlace"><span class="">مكان انعقاد الجلسة الأولى</span></label>--}}
                            {{--            <input class="form-control" type="text" name="firstSessionPlace" id="firstSessionPlace">--}}
                            {{--        </div>--}}
                            {{--        <br><br>--}}
                            {{--        <div class="mt-2" id="hiddenReqular">--}}
                            {{--            <label for="firstSessionPlace"><h1>تكرار الانعقاد</h1></label>--}}
                            {{--            <br>--}}
                            {{--            <br>--}}
                            {{--            <!-- start days -->--}}
                            {{--            <div style="display: inline-block" class="ml-4">--}}
                            {{--                <label for=""><h1 class=""> الأيام : </h1></label><br>--}}
                            {{--            </div>--}}
                            {{--            <div class="ml-5">--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="daysCheckbox1"><span class="">الأحد</span></label>--}}
                            {{--                    <input class="days form-check-input" type="checkbox" id="daysCheckbox1" value="sunday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="daysCheckbox2"><span class="">الإثنين</span></label>--}}
                            {{--                    <input class="days form-check-input" type="checkbox" id="daysCheckbox2" value="monday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="daysCheckbox3"><span class="">الثلاثاء</span></label>--}}
                            {{--                    <input class="days form-check-input" type="checkbox" id="daysCheckbox3" value="tuesday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="daysCheckbox4"><span class="">الأربعاء</span></label>--}}
                            {{--                    <input class="days form-check-input" type="checkbox" id="daysCheckbox4" value="wednesday">--}}
                            {{--                </div>--}}

                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="daysCheckbox5"><span class="">الخميس</span></label>--}}
                            {{--                    <input class="days form-check-input" type="checkbox" id="daysCheckbox5" value="thursday">--}}
                            {{--                </div>--}}
                            {{--            </div>--}}
                            {{--            <!-- end days -->--}}
                            {{--            <br>--}}
                            {{--            <br>--}}
                            {{--            <!-- begin weeks -->--}}
                            {{--            <div style="display: inline-block" class="ml-4">--}}
                            {{--                <label for=""><h1 class=""> الأسابيع : </h1></label><br>--}}
                            {{--            </div>--}}
                            {{--            <div style="width: 1500px" class="ml-5">--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="weeksCheckbox1"><span class="">الأسبوع الأول</span></label>--}}
                            {{--                    <input class="weeks form-check-input" type="checkbox" id="weeksCheckbox1" value="sunday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="weeksCheckbox2"><span class="">الأسبوع الثاني</span></label>--}}
                            {{--                    <input class="weeks form-check-input" type="checkbox" id="weeksCheckbox2" value="monday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3">--}}
                            {{--                    <label class="form-check-label" for="weeksCheckbox3"><span class="">الأسبوع الثالث</span></label>--}}
                            {{--                    <input class="weeks form-check-input" type="checkbox" id="weeksCheckbox3" value="tuesday">--}}
                            {{--                </div>--}}
                            {{--                <div class="form-check form-check-inline ml-3 mr-3 mb-4">--}}
                            {{--                    <label class="form-check-label" for="weeksCheckbox4"><span class="">الأسبوع الرابع</span></label>--}}
                            {{--                    <input class="weeks form-check-input" type="checkbox" id="weeksCheckbox4" value="wednesday">--}}
                            {{--                </div>--}}
                            {{--            </div>--}}
                            {{--            <!-- end week -->--}}
                            {{--        </div>--}}
                            {{--    </div>--}}

                            <!-- end Regularity -->
                            <br><br>

                            <!--begin::Separator-->
                            <div class="separator mb-6"></div>
                            <!--end::Separator-->

                            <!--begin::Action buttons-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                {{--        submit--}}
                                <button type="button" onclick="performStore()" data-kt-contacts-type="submit"
                                    class="btn btn-primary">
                                    <span id="createCommittee" class="indicator-label">انشاء اللجنة</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" onclick="reset('createCommitteeForm')"
                                    data-kt-contacts-type="cancel" class="btn btn-light me-6">الغاء
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Action buttons-->
                            <div></div>
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

@endsection

@section('scripts')

<script src="{{asset('assets/plugins/custom/repeater/repeater.js')}}"></script>
<!-- begin Regulations&tasks script -->
<script>
function performStore() {
    let committeeNumber = document.getElementById('commNumber').value;
    let committeeDate = document.getElementById('commDate').value;

    if (document.getElementsByName('isRegular').checked) {
        isRegular = document.getElementsByName('isRegular').value;
    }

    let isRegular = document.getElementsByName('isRegular');
    let isRegularValue;

    for (i = 0; i < isRegular.length; i++) {
        if (isRegular[i].checked)
            isRegularValue = isRegular[i].value;
    }

    // let days = document.querySelector('.days:checked').value;
    // let weeks = document.querySelector('.weeks:checked').value;


    let data = {
        committeeName: document.getElementById('commName').value,
        committeeNumber: committeeNumber,
        committeeDate: committeeDate,
        committeeID: committeeDate.replaceAll('-', '') + committeeNumber,
        isRegular: isRegularValue,
        // members: document.getElementsByName('category-group[1][memberName]').value,
        // tasks: document.getElementById('tasks').value,
        // regulations: document.getElementById('regulations').value,
        // firstSessionDate: document.getElementById('firstSessionDate').value,
        // firstSessionStartTime: document.getElementById('firstSessionStartTime').value,
        // firstSessionEndTime: document.getElementById('firstSessionEndTime').value,
        // firstSessionPlace: document.getElementById('firstSessionPlace').value,
        // days: days,
        // weeks: weeks
    }

    console.log(data);

    createCommittee('/user/committees', data, 'createCommitteeForm', 'createCommittee');
}

let i = 2;

//repeater
function addRegulation() {
    let newInput =
        "<div class='form-row mt-2'><div class='col-auto'><label for='regulation" + i + "'>وصف الضابط رقم " +
        i + " </label></div><div class='col-sm-9 '><input class='form-control' type='text' name='regulation" +
        i + "' id='regulation" + i + "'></div></div>";
    i++;
    $('#Regulations').append(newInput);
}

let j = 2;

function addTask() {
    let newInput =
        "<div class='form-row mt-2'><div class='col-auto'><label for='task" + j + "'>وصف المهمة رقم " + j +
        " </label></div><div class='col-sm-9 '><input class='form-control' type='text' name='task" + j +
        "' id='task" + j + "'></div></div>";
    j++;
    $('#Tasks').append(newInput);
}
/*
<!-- end Regulations script-->

<
!--begn regularity script-- > */
// let hiddenNonReqularBox = document.getElementById('hiddenNonReqular');
// let hiddenReqularBox = document.getElementById('hiddenReqular');
//
// hiddenNonReqularBox.style.display = 'none';
// hiddenReqularBox.style.display = 'none';
//
// function handleRadioClick() {
//     if (document.getElementById('Regular').checked) {
//         hiddenNonReqularBox.style.display = 'block';
//         hiddenReqularBox.style.display = 'block';
//     } else if (document.getElementById('NonRegular').checked) {
//         hiddenNonReqularBox.style.display = 'block';
//         hiddenReqularBox.style.display = 'none';
//     }
// }
//
// const radioButtons = document.querySelectorAll('input[name="isRegular"]');
// radioButtons.forEach(radio => {
//     radio.addEventListener('click', handleRadioClick);
// });
/*
<
!--end regularity script-- >

<
!--begin modal script-- >*/
let x = 1
$('#memberModal').on('show.bs.modal', function(event) {
    let button = $(event.relatedTarget)
    let memberNum = x
    let modal = $(this)
    modal.find('.modal-title').text('إضافة عضو رقم ' + memberNum)
    modal.find('#memberNum').val(memberNum)
    // modal.find('.modal-body input').val(recipient)
})
$('#addMember').on('click', function(event) {
    ++x;
    //console.log(x)
})
/*<
   !--end modal script-- >
   <
   !--begin repeater-- >*/
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
                text: "لا يمكنك الرجوع بعد اجراء هذه العملية !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d76e3',
                cancelButtonColor: '#da0000',
                confirmButtonText: 'نعم احذف',
                cancelButtonText: 'لا تقم بالحذف'
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