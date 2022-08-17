<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
    th {
        width: 20%
    }
    </style>
</head>

<body dir="rtl">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="navbar-brand">
            <img src="https://palsawa.com/uploads/images/2y3r0.jpg" width="40" height="40"
                class="d-inline-block align-top" alt="">
        </div>

        <h5 class="my-0 mr-md-auto font-weight-normal">وزارة الأوقاف و الشؤون الدينية</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#"></a>
        </nav>
    </div>

    @if($errors->any())
    <ul  class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('updatecommittee.update',$committee->committeeID)}}" id="form" method="POST">
            @csrf 
            @method('put')
            <div class="col-7 mr-auto  ml-3 mt-3">
                <h4>تعديل بيانات لجنة {{$committee->committeeName}}</h4>
                <hr>
                <div class="mt-2">
                    <label for="commName">اسم اللجنة</label>
                    <input class="form-control" type="text" name="commName" id="commName" value="{{$committee->committeeName}}">
                </div>
                <div class="mt-3">
                    <label for="commMembers">أعضاء اللجنة</label>
                </div>
                <div class="mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th>رقم العضو</th> -->
                                <th class="mr-5 ml-5">اسم العضو</th>
                                <th> الصفة</th>
                                <th> حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td>{{$member->employee->employeeName}}</td> <!--  -->
                                <td>{{$member->memberDescription}}</td>
                                <td><button class="btn btn-light text-danger"><a href="{{route('delete.member', ['employeeID' => $member->employee_employeeID ,'committeeID'=>$member->committee_committeeID ,'memberID'=>$member->memberID ])}}">إزالة العضو من اللجنة</a></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="repeater">
                        <div data-repeater-list="membersGroup">
                            <div data-repeater-item>

                                <div class="form-row mt-3  ">
                                
                                    <input type="hidden" name="id" id="member-id" value=""/> 
                                    <div class=" col-auto">
                                        <input class="form-control ml-3 mr-3" name="memberName" id="memberName"
                                            list="brow"  value="<?php if($errors->any()) echo old('membersGroup.0.memberName');?>"> 
                                        <datalist type="inset" id="brow" name="brow">
                                            @foreach($employees as $employee)
                                            <option id="{{$employee->employeeID}}" value="{{$employee->employeeName}}">
                                                @endforeach
                                        </datalist>
                                    </div>
                                    <div class=" col-sm-4 ">

                                        <select aria-hidden="true" class="form-control w-auto ml-5"
                                            name="memberDescription" id="memberDescription">
                                            <option value=""></option>
                                            <option value="CommitteeChairman">رئيس اللجنة</option>
                                            <option value="CommitteeViceChairman">نائب رئيس اللجنة</option>
                                            <option value="CommitteeSecretary">أمين سر اللجنة</option>
                                            <option value="CommitteeMember">عضو لجنة</option>
                                        </select>
                                    </div>
                                    <div class=" col-sm-3 ml-3 " id="colo">
                                        <input data-repeater-delete type="button" class="btn btn-danger"
                                            value="Delete" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input data-repeater-create type="button" class="btn btn-info mt-2" value="Add" />

                    </div>
                </div>

                <!-- end emb tabel -->
                <!-- begin tasks -->
                <div class="repeater mt-2" id="Tasks">

                    <label for="Tasks">مهام اللجنة</label>
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="mr-5 ml-5">رقم المهمة</th>
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

                                <td><button class="btn btn-light text-danger "><a href="{{route('delete.task',['taskID' => $task->taskID ,'committeeID'=>$committee->committeeID ])}}">حذف المهمة</a></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div data-repeater-list="tasksGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="cat-id" />
                                <div class="col-auto">
                                    <label for="taskDescription">وصف المهمة</label>
                                </div>
                                <div class="col-sm-7 ">
                                    <input class="form-control" type="text" name="taskDescription" id="taskDescription" value="">
                                </div>
                                <div class="col-sm-auto ">
                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-info" value="Add" />
                </div>
                <!-- end tasks -->
                <!-- begin regulations  -->
                <div class="repeater mt-2" id="Regulations">

                    <label for="Regulations">ضوابط اللجنة</label>
                  
                    <table class="table table-hover">
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
                                <td><button class="btn btn-light text-danger "><a href="{{route('delete.regulation', ['regulationID' => $regulation->regulationID ,'committeeID'=>$committee->committeeID ])}} ">حذفالضابط</a> </button></td>
                            </tr>
                            <!-- "{{route('delete.regulation', ['regulationID' => $regulation->regulationID ,'committeeID'=>$committee->committeeID ])}}"></       ** deleteRegulation/$regulation->regulationID/$committee->committeeID **    -->
                            @endforeach
                        </tbody>
                    </table>
                    <div data-repeater-list="regulationsGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="regulation-id" />
                                <div class="col-auto">
                                    <label for="regulationDescription">وصف الضابط</label>

                                </div>
                                <div class="col-sm-7 ">
                                    <input class="form-control" type="text" name="regulationDescription"
                                        id="regulationDescription" value="<?php if($errors->any()) echo old('regulationDescription');?>"> 
                                </div>
                                <div class="col-sm-auto ">
                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-info" value="Add" />
                </div>
                <!-- end regulations  -->
               
            </div>
            <div class="col-5">
                <hr>
                <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="حفظ التعديلات ">
            </div>
        </form>
    </div>


</body>


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

  
</html>