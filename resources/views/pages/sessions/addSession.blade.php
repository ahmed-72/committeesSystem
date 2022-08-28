@extends('pages.parent')

@section('page_name','إضافة جلسة جديدة')
@section('main_path','الجلسات')
@section('sub_path','إضافة جلسة جديدة')

@section('styles')
@endsection

@section('content')



@if($errors->any())
<ul class="alert alert-danger col-6">
    @foreach($errors->all() as $message)
    <li>{{$message}}</li>
    @endforeach
</ul>
@endif
<div class="card card-flush h-md-100 col-9 px-4 fs-3">

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
                    <?php
                        $id = $committee->committeeID;
                        $replacement = ' -- ';
                        $committeeDate =substr_replace($id, $replacement, 8, 0); 
                        ?>
                    <label class="form-control" type="text" readonly>{{$id}} --{{$committeeDate}}
                        --{{$committee->committeeName}} </label>
                    <input class="form-control" type="text" name="committeeID" id="committeeID" value="{{$id}}" hidden>

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

</div>
</div>

@endsection

@section('scripts')
@endsection