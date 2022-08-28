@extends('pages.parent')

@section('page_name','تحضير الجلسة')
@section('main_path','الجلسات')
@section('sub_path','تحضير الجلسة')

@section('styles')
@endsection

@section('content')





<div class="card card-flush h-md-100 col-9 p-3">
    @if($errors->any())
    <ul class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif
    @if(count($topics)>0)
    @if($session->status =="inProgress")
    <form action="{{route('sessionConfirmation')}}" class="fs-3" method="post">
        @csrf
        <div class="header">

            <h5> &nbsp;تحضير جدول أعمال جلسة رقم &nbsp; {{$session->sessionID}} &nbsp; للجنة &nbsp;
                {{$session->committee->committeeName}} &nbsp; </h5>
            <h5> بتاريخ : &nbsp; {{$session->sessionDate}} &nbsp; من الساعة: &nbsp; {{$session->sessionStartAt}} &nbsp;
                إلى الساعة: &nbsp; {{$session->sessionEndAt}} </h5>
            <hr class="col-8">

            <h5 class="input-group mb-3" style="display:none">
                <span class="input-group-text">تحضير جدول أعمال جلسة رقم </span>
                <input type="text" class="form-control someInput" readonly name="sessionID"
                    value="{{$session->sessionID}}">
                <span class="input-group-text">للجنة</span>
                <input class="form-control someInput" readonly name="committeeName"
                    value="{{$session->committee->committeeName}}">
                <span class="input-group-text">رقم</span>
                <input class="form-control someInput" readonly name="committeeID"
                    value="{{$session->committee_committeeID}}">
            </h5>
        </div>

        <div class="discussion">
            <label class="fs-4 fw-bold" for="">قائمة البنود المطروحة للنقاش :</label>

            <table id="topics" class="table table-hover table-rounded table-striped border fs-4">  
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <th>البند</th>
                        <th>جهة التنسيب</th>
                        <th>مشروع القرار المقترح</th>
                        <th>حالة البند</th>
                        <th>اختيار &nbsp; <input type="button" id="selectAll" class="main btn btn-info "
                                value="تحديد الكل"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $topic)
                    <tr>
                        <td>{{$topic->topicDescription}}</td>
                        <td>{{$topic->employee->employeeDepartment}}</td>
                        <td>{{$topic->ResolutionDescription}}</td>
                        <td>{{$topic->isDiscussed}}</td>
                        <td>@if($topic->isDiscussed != 'inProgress')<input type="checkbox" name="topicID[]"
                                value="{{$topic->topicID}}">@endif</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class=" mb-2">
                <hr>
                <h5 class="text-primary">هل ترغب في تعديل موعد الجلسة ؟</h5>
                <label class="custom-control-label" for="yes">نعم</label>
                <input type="radio" class="custom-control-input" name="updateSession" id="yse" value="1">
                <hr class="col-3">
            </div>
            <div class="" id="hiddenBox">
                <div class=" mb-2">
                    <label class="d-inline-block" for="SessionDate">التاريخ</label>
                    <input type="date" class="form-control" name="SessionDate" value="{{$session->sessionDate}}">

                </div>
                <div class=" mb-2">
                    <label class="d-inline" for="SessionTimeStart">من الساعة </label>
                    <input type="time" class="form-control d-inline " name="SessionTimeStart"
                        value="{{$session->sessionEndAt}}">
                </div>
                <div class=" mb-2">
                    <label class="d-inline" for="SessionTimeEnd">إلى الساعة</label>
                    <input type="time" class="form-control d-inline " name="SessionTimeEnd"
                        value="{{$session->sessionStartAt}}">
                </div>
                <div class="mb-2">
                    <label class="d-inline-block" for="SessionPlace">المكان</label>
                    <input type="text" class="form-control d-inline-block" name="SessionPlace" placeholder="المكان"
                        value="{{$session->sessionRoom}}">
                </div>
            </div>
            <!-- submit -->
            <div class="col-5">
                <hr>
                <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5"
                    value="تأكيد الجلسة و إرسال اشعارات للأعضاء">
            </div>
    </form>

</div>
@else 
<div class="alert alert-danger col-6">
هذه الجلسة انتهت مسبقا
</div>
@endif
@endif
</div>


@endsection

@section('scripts')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
var hiddenBox = document.getElementById('hiddenBox');
hiddenBox.style.display = 'none';

function handleRadioClick() {
    hiddenBox.style.display = 'block';
}
const radioButtons = document.querySelectorAll('input[name="updateSession"]');
radioButtons.forEach(radio => {
    radio.addEventListener('click', handleRadioClick);
});
</script>
<script>
$(document).ready(function() {
    $('body').on('click', '#selectAll', function() {
        if ($(this).hasClass('allChecked')) {
            $('input[type="checkbox"]', '#topics').prop('checked', false);
            document.getElementById('selectAll').value = "تحديد الكل";
        } else {
            $('input[type="checkbox"]', '#topics').prop('checked', true);
            document.getElementById('selectAll').value = "إلغاء التحديد";

        }
        $(this).toggleClass('allChecked');
    })
});
</script>
@endsection