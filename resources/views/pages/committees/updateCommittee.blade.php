@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')
@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
    integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

<link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">

<!-- Bootstrap core CSS -->
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

<title>Document</title>
<style>
th {
    width: 15%
}
</style>
@endsection

@section('content')




<div dir="rtl" class="card card-flush h-lg-100" id="kt_contacts_main" data-select2-id="select2-data-kt_contacts_main">


    @if($errors->any())
    <ul class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('updatecommittee.update',$committee->committeeID)}}" id="form" method="POST">
            @csrf @method('put')
            <div class="col-auto mr-auto  ml-3 mt-3">
            <h4>تعديل بيانات لجنة {{$committee->committeeName}}</h4>
                <hr>
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-3">
                    <div class="col">

                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label for="commName" class="fs-3 form-label mt-3">
                                <span class="">اسم اللجنة</span>
                            </label>
                            <input type="text" class="fs-3 form-control form-control-solid border" name="commName"
                                id="commName"  value="{{$committee->committeeName}}" required>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                </div>
                <hr>
               
                <div class="mt-3">
                    <label class="fs-3 fw-bold form-label mt-3" for="commMembers">أعضاء اللجنة</label>
                </div>
                <div class="mt-3">
                    <table class="table table-hover fs-3 form-label mt-3 col-10">
                        <thead>
                            <tr>
                                <!-- <th>رقم العضو</th> -->
                                <th>اسم العضو</th>
                                <th> الصفة</th>
                                <th class="px-5"> حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td>{{$member->employee->employeeName}}</td> <!--  -->
                                <td>{{$member->memberDescription}}</td>
                                <td> <button  type="button" class="btn btn-outline-danger border border-danger text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                       <a href="{{route('delete.member', ['employeeID' => $member->employee_employeeID ,'committeeID'=>$member->committee_committeeID ,'memberID'=>$member->memberID ])}}">إزالة العضو من اللجنة</a></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="repeater">
                        <div data-repeater-list="membersGroup">
                            <div data-repeater-item>

                                <div class="form-row mt-3  ">
                                    <input type="hidden" name="id" id="member-id" />
                                    <!-- <div class=" col-sm-2 ">
                                        <input class="form-control  mr-3" type="text" name="memberID" id="memberID">
                                    </div> -->
                                    <div class=" col-auto">
                                        <input class=" fs-3 form-control form-control-solid border ml-3 mr-5"
                                            name="memberName" id="memberName" list="brow"
                                            value="<?php if ($errors->any()) echo old('membersGroup.0.memberName'); ?>">
                                        <datalist type="inset" id="brow" name="brow">
                                            @foreach($employees as $employee)
                                            <option id="{{$employee->employeeID}}" value="{{$employee->employeeName}}">
                                                @endforeach
                                        </datalist>
                                    </div>
                                    <div class=" col-sm-4 ">

                                        <select aria-hidden="true"
                                            class="fs-3 form-control form-control-solid border w-auto ml-5"
                                            name="memberDescription" id="memberDescription">
                                            <option value=""></option>
                                            <option value="رئيس اللجنة">رئيس اللجنة</option>
                                            <option value="نائب رئيس اللجنة">نائب رئيس اللجنة</option>
                                            <option value="أمين سر اللجنة">أمين سر اللجنة</option>
                                            <option value="عضو لجنة">عضو لجنة</option>
                                            @if($errors->any())
                                            <option selected
                                                value="<?php echo old('membersGroup.0.memberDescription'); ?>">
                                                <?php echo old('membersGroup.0.memberDescription'); ?> </option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class=" col-sm-3 ml-3 " id="colo">
                                        <button data-repeater-delete type="button"
                                            class="btn btn-outline-danger border border-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                                </path>
                                            </svg>
                                            حذف
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button data-repeater-create type="button" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
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
                            أضف عنصراً آخر
                        </button>
                    </div>
                </div>

                <!-- end emb tabel -->

                <!-- begin tasks -->
                <div class="repeater mt-2" id="Tasks">

                    <label class="fs-3 fw-bold form-label mt-3" for="Tasks">مهام اللجنة</label>
                    <table class="table table-hover fs-3">
                        <thead>
                            <tr>
                                <th class="mr-5 ml-5 " >رقم المهمة</th>
                                <th>تفاصيل المهمة</th>
                                <th>حذف المهمة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->taskID}}</td>
                                <td>{{$task->taskDescription}}</td> 
                                <!-- <td><button class="btn btn-light text-danger ">
                                    <a href="javascript:void(0);" class="delete" data-id="{{ $task->taskID }}" >حذف المهمة </a></button></td> -->
                                  <td>  <button  type="button" class="btn btn-outline-danger border border-danger text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                       
                                <a href="{{route('delete.task',['taskID' => $task->taskID ,'committeeID'=>$committee->committeeID ])}}">حذف المهمة</a></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>

                    <div data-repeater-list="tasksGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="cat-id" />
                                <div class="col-auto">
                                    <label class="fs-3 form-label mt-3" for="taskDescription">وصف المهمة</label>
                                </div>
                                <div class="col-sm-8">
                                    <input class="fs-3 form-control form-control-solid border" type="text"
                                        name="taskDescription" id="taskDescription"
                                        value="<?php if ($errors->any()) echo old('tasksGroup.0.taskDescription'); ?>">
                                </div>
                                <div class="col-sm-auto ">
                                    <button data-repeater-delete type="button"
                                        class="btn btn-outline-danger border border-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button data-repeater-create type="button" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
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
                        أضف عنصراً آخر
                    </button>
                </div>
                <!-- end tasks -->


                <!-- begin regulations  -->
                <div class="repeater mt-2" id="Regulations">

                    <label class="fs-3 fw-bold form-label mt-3" for="Regulations">ضوابط اللجنة</label>
                    <table class="table table-hover fs-3">
                        <thead>
                            <tr>
                                <th class="mr-5 ml-5">رقم الضابط</th>
                                <th>تفاصيل الضابط</th>
                                <th>حذف الضابط</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regulations as $regulation)
                            <tr>
                                <td>{{$regulation->regulationID}}</td>
                                <td>{{$regulation->regulationDescription}}</td> 
                                <td>
                                <button  type="button" class="btn btn-outline-danger border border-danger text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                       <a href="{{route('delete.regulation', ['regulationID' => $regulation->regulationID ,'committeeID'=>$committee->committeeID ])}} ">حذف الضابط</a> </button></td>
                            </tr>
                            <!-- "{{route('delete.regulation', ['regulationID' => $regulation->regulationID ,'committeeID'=>$committee->committeeID ])}}"></       ** deleteRegulation/$regulation->regulationID/$committee->committeeID **    -->
                            @endforeach
                        </tbody>
                    </table>
                    <hr>

                    <div data-repeater-list="regulationsGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="regulation-id" />
                                <div class="col-auto">
                                    <label class="fs-3 form-label mt-3" for="regulationDescription">وصف الضابط</label>
                                </div>
                                <div class="col-sm-8">
                                    <input class="fs-3 form-control form-control-solid border" type="text"
                                        name="regulationDescription" id="regulationDescription"
                                        value="<?php if ($errors->any()) echo old('regulationsGroup.0.regulationDescription'); ?>">
                                </div>
                                <div class="col-sm-auto ">
                                    <button data-repeater-delete type="button"
                                        class="btn btn-outline-danger border border-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button data-repeater-create type="button" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
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
                        أضف عنصراً آخر
                    </button>
                </div>


                <!-- end regulations  -->
               
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="حفظ التعديلات ">
            </div>
        </form>
    </div>
</div>

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
<!-- begin Regulations&tasks script -->

<!-- end Regulations script -->

<!-- begin regularity script -->
<script>
var hiddenNonReqularBox = document.getElementById('hiddenNonReqular');
var hiddenReqularBox = document.getElementById('hiddenReqular');

hiddenNonReqularBox.style.display = 'none';
hiddenReqularBox.style.display = 'none';

function handleRadioClick() {
    if (document.getElementById('Regular').checked) {
        hiddenNonReqularBox.style.display = 'block';
        hiddenReqularBox.style.display = 'block';
    } else if (document.getElementById('NonRegular').checked) {
        hiddenNonReqularBox.style.display = 'block';
        hiddenReqularBox.style.display = 'none';
    }
}
const radioButtons = document.querySelectorAll('input[name="isRegular"]');
radioButtons.forEach(radio => {
    radio.addEventListener('click', handleRadioClick);
});
</script>
<!-- end regularity script -->

<!-- begin repeater -->
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
            if (confirm('هل أنت متأكد من أنك تريد حذف هذا العنصر؟')) {
                window.id--;
                $('#cat-id').val(window.id);

                $(this).slideUp(deleteElement);
                console.log($('.repeater').repeaterVal());
            }
        },
        ready: function(setIndexes) {


        }
    });


});
</script>
<!-- end repeater -->


@endsection
 




