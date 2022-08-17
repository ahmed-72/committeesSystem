<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

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
            <img src="https://palsawa.com/uploads/images/2y3r0.jpg" width="40" height="40" class="d-inline-block align-top" alt="">
        </div>

        <h5 class="my-0 mr-md-auto font-weight-normal">وزارة الأوقاف و الشؤون الدينية</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#"></a>
        </nav>
    </div>

    @if($errors->any())
    <ul class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('addCommittee.store')}}" id="form" method="POST">
            @csrf
            <div class="col-7 mr-auto  ml-3 mt-3">
                <h4>إنشاء لجنة جديدة</h4>
                <hr>
                <div class="mt-3">
                    <label for="commNumber">رقم اللجنة</label>
                    <input class="form-control" type="text" name="commNumber" id="commNumber" value="<?php if ($errors->any()) echo old('commNumber'); ?>">
                </div>
                <div class="mt-2">
                    <label for="commName">اسم اللجنة</label>
                    <input class="form-control" type="text" name="commName" id="commName" value="<?php if ($errors->any()) echo old('commName'); ?>">
                </div>
                <div class="mt-2">
                    <label for="commDate">تاريخ إنشاء اللجنة</label>
                    <input class="form-control" type="date" name="commDate" id="commDate" value="<?php if ($errors->any()) echo old('commDate'); ?>">
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
                                        <input class="form-control ml-3 mr-3" name="memberName" id="memberName" list="brow" value="<?php if ($errors->any()) echo old('membersGroup.0.memberName'); ?>">
                                        <datalist type="inset" id="brow" name="brow">
                                            @foreach($employees as $employee)
                                            <option id="{{$employee->employeeID}}" value="{{$employee->employeeName}}">
                                                @endforeach
                                        </datalist>
                                    </div>
                                    <div class=" col-sm-4 ">

                                        <select aria-hidden="true" class="form-control w-auto ml-5" name="memberDescription" id="memberDescription">
                                            <option value=""></option>
                                            <option value="رئيس اللجنة">رئيس اللجنة</option>
                                            <option value="نائب رئيس اللجنة">نائب رئيس اللجنة</option>
                                            <option value="أمين سر اللجنة">أمين سر اللجنة</option>
                                            <option value="عضو لجنة">عضو لجنة</option>
                                            @if($errors->any())
                                            <option selected value="<?php echo old('membersGroup.0.memberDescription'); ?>"><?php echo old('membersGroup.0.memberDescription'); ?> </option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class=" col-sm-3 ml-3 " id="colo">
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete" />
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
                    <hr>

                    <div data-repeater-list="tasksGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="cat-id" />
                                <div class="col-auto">
                                    <label for="taskDescription">وصف المهمة</label>
                                </div>
                                <div class="col-sm-7 ">
                                    <input class="form-control" type="text" name="taskDescription" id="taskDescription" value="<?php if ($errors->any()) echo old('tasksGroup.0.taskDescription'); ?>">
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
                    <hr>

                    <div data-repeater-list="regulationsGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="regulation-id" />
                                <div class="col-auto">
                                    <label for="regulationDescription">وصف الضابط</label>
                                </div>
                                <div class="col-sm-7 ">
                                    <input class="form-control" type="text" name="regulationDescription" id="regulationDescription" value="<?php if ($errors->any()) echo old('regulationsGroup.0.regulationDescription'); ?>">
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
                <!-- start Regularity -->
                <div class="form-row mt-2">
                    <div class="col-md-5 mb-5 ">
                        <label for="isRegular">هل اللجنة لها جلسات دورية</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline col-md-3 mb-3">
                        <input type="radio" id="Regular" value="1" name="isRegular" class="custom-control-input">
                        <label class="custom-control-label" for="Regular">نعم</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline col-md-3 mb-3">
                        <input type="radio" id="NonRegular" value="0" name="isRegular" class="custom-control-input">
                        <label class="custom-control-label" for="NonRegular">لا</label>
                    </div>
                </div>

                <div class="mt-2" id="hiddenNonReqular">
                    <div class="mt-3">
                        <label for="firstSessionDate">تاريخ انعقاد الجلسة الأولى</label>
                        <input class="form-control" type="date" name="firstSessionDate" id="firstSessionDate" value="<?php if ($errors->any()) echo old('firstSessionDate'); ?>">
                    </div>
                    <div class="mt-2">
                        <label for="firstSessionTime">وقت بداية الجلسة الأولى</label>
                        <input class="form-control" type="time" name="firstSessionTimeStart" id="firstSessionTime" value="<?php if ($errors->any()) echo old('firstSessionTimeStart'); ?>">
                    </div>
                    <div class="mt-2">
                        <label for="firstSessionTime">وقت انتهاء الجلسة الأولى</label>
                        <input class="form-control" type="time" name="firstSessionTimeEnd" id="firstSessionTime" value="<?php if ($errors->any()) echo old('firstSessionTimeEnd'); ?>">
                    </div>
                    <div class="mt-2 mb-4">
                        <label for="firstSessionPlace">مكان انعقاد الجلسة الأولى</label>
                        <input class="form-control" type="text" name="firstSessionPlace" id="firstSessionPlace" value="<?php if ($errors->any()) echo old('firstSessionPlace'); ?>">
                    </div>
                    <div class="mt-2" id="hiddenReqular">
                        <label for="firstSessionPlace">تكرار الانعقاد</label>
                        <!-- start days -->
                        <div class="ml-4">
                            <label for="">: الأيام </label><br>
                        </div>
                        <div class="days  ml-5">
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="daysCheckbox1">الأحد</label>
                                <input class="form-check-input" type="checkbox" id="daysCheckbox1" name="daysCheckbox1" name="daysCheckbox1" value="sunday">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="daysCheckbox2">الإثنين</label>
                                <input class="form-check-input" type="checkbox" id="daysCheckbox2" name="daysCheckbox1" value="monday">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="daysCheckbox3">الثلاثاء</label>
                                <input class="form-check-input" type="checkbox" id="daysCheckbox3" name="daysCheckbox1" value="tuesday">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="daysCheckbox4">الأربعاء</label>
                                <input class="form-check-input" type="checkbox" id="daysCheckbox4" name="daysCheckbox1" value="wednesday">
                            </div>

                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="daysCheckbox5">الخميس</label>
                                <input class="form-check-input" type="checkbox" id="daysCheckbox5" name="daysCheckbox1" value="thursday">
                            </div>
                        </div>
                        <!-- end days -->
                        <!-- begin weeks -->
                        <div class="ml-4">
                            <label for="">: الأسابيع </label><br>
                        </div>
                        <div class="weeks  ml-5">
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="weeksCheckbox1">الأسبوع الأول</label>
                                <input class="form-check-input" type="checkbox" id="weeksCheckbox1" name="weeksCheckbox[]" value="firstWeek">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="weeksCheckbox2">الأسبوع الثاني</label>
                                <input class="form-check-input" type="checkbox" id="weeksCheckbox2" name="weeksCheckbox[]" value="secondWeek">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3">
                                <label class="form-check-label" for="weeksCheckbox3">الأسبوع الثالث</label>
                                <input class="form-check-input" type="checkbox" id="weeksCheckbox3" name="weeksCheckbox[]" value="thirdWeek">
                            </div>
                            <div class="form-check form-check-inline ml-3 mr-3 mb-4">
                                <label class="form-check-label" for="weeksCheckbox4">الأسبوع الرابع</label>
                                <input class="form-check-input" type="checkbox" id="weeksCheckbox4" name="weeksCheckbox[]" value="fourthWeek">
                            </div>
                        </div>
                        <!-- end week -->
                    </div>
                </div>

                <!-- end Regularity -->
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="أنشئ اللجنة">
            </div>
        </form>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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

<script>
    /*    function nameSelected() {

  var id = $('#brow option:selected').attr('id');

$("#brow option").eq(id).remove();
     }
     document.getElementById("brow").addEventListener("click",nameSelected);



 function nameSelected() {
     var name=   $("#memberName").val();
       // $("#memberName:selected").vlaue();
      console.log(name);
    }
document.getElementById("memberName").addEventListener("select",nameSelected);
*/
</script>



</html>