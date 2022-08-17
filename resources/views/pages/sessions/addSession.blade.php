<!DOCTYPE html>
<html lang="en">

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
    <ul class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('addSession.store')}}" id="form" method="POST">
            @csrf
            <div class="col-7 mr-auto  ml-3 mt-3">
                <div class="col-6">
                    <h4>إنشاء جلسة جديدة</h4>
                    <hr>
                </div>
                <div class="mt-3">
                    <label for="committeeID">رقم اللجنة</label>
                    <select class="form-control" type="text" name="committeeID" id="committeeID">
                        <option value="" disabled selected hidden>تاريخ إنشاء اللجنة -- رقم اللجنة -- اسم اللجنة
                        </option>

                        @foreach($committees as $committee)
                        <?php
                        $id = $committee->committeeID;
                        $replacement = ' -- ';
                        $committeeID_Date =substr_replace($id, $replacement, 8, 0); 
                        ?>
                        <option value="{{$committee->committeeID}}">{{$committeeID_Date}} --
                            {{$committee->committeeName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 mt-2">
                    <div class="">
                        <label for="firstSessionDate">تاريخ انعقاد الجلسة القادمة</label>
                        <input class="form-control" type="date" name="firstSessionDate" id="firstSessionDate"
                            value="<?php if($errors->any()) echo old('firstSessionDate');?>">
                    </div>
                    <div class="mt-2">
                        <label for="firstSessionTime">وقت بداية الجلسة القادمة</label>
                        <input class="form-control" type="time" name="firstSessionTimeStart" id="firstSessionTime"
                            value="<?php if($errors->any()) echo old('firstSessionTimeStart');?>">
                    </div>
                    <div class="mt-2">
                        <label for="firstSessionTime">وقت انتهاء الجلسة القادمة</label>
                        <input class="form-control" type="time" name="firstSessionTimeEnd" id="firstSessionTime"
                            value="<?php if($errors->any()) echo old('firstSessionTimeEnd');?>">
                    </div>
                    <div class="mt-2 mb-4">
                        <label for="firstSessionPlace">مكان انعقاد الجلسة القادمة</label>
                        <input class="form-control" type="text" name="firstSessionPlace" id="firstSessionPlace"
                            value="<?php if($errors->any()) echo old('firstSessionPlace');?>">
                    </div>

                    <div class="col-5">
                        <hr>
                        <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="أنشئ جلسة">
                    </div>
                </div>

        </form>
    </div>
</body>

</html>