<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <div class="col-9 p-3">
        @if($errors->any())
        <ul class="alert alert-danger col-6">
            @foreach($errors->all() as $message)
            <li>{{$message}}</li>
            @endforeach
        </ul>
        @endif 
        @if(count($topics)>0)
        <form action="{{route('sessionConfirmation')}}" method="post">
            @csrf
            <div class="header">
                
                <h5> &nbsp;تحضير جدول أعمال جلسة رقم   &nbsp; {{$session->sessionID}}  &nbsp;  للجنة   &nbsp; {{$session->committee->committeeName}}  &nbsp;  </h5>
                <h5> بتاريخ :  &nbsp; {{$session->sessionDate}} &nbsp; من الساعة: &nbsp; {{$session->sessionStartAt}} &nbsp; إلى الساعة: &nbsp; {{$session->sessionEndAt}} </h5>
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
                
                <table id="topics" class="table table-hover">
                    <thead>
                        <tr>
                            <th>البند</th>
                            <th>جهة التنسيب</th>
                            <th>مشروع القرار المقترح</th>
                            <th>حالة البند</th>
                            <th>اختيار &nbsp; <input type="button" id="selectAll" class="main btn btn-info " value="تحديد الكل"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <td>{{$topic->topicDescription}}</td>
                            <td>{{$topic->employee->employeeDepartment}}</td>
                            <td>{{$topic->ResolutionDescription}}</td>
                            <td>{{$topic->isDiscussed}}</td>
                            <td>@if($topic->isDiscussed != 'inProgress')<input type="checkbox" name="topicID[]" value="{{$topic->topicID}}">@endif</td>
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
                        <input type="date" class="form-control" name="SessionDate"
                            value="{{$session->sessionDate}}">

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
    @endif
    </div>


</body>
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
    $(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#topics').prop('checked', false);
        document.getElementById('selectAll').value="تحديد الكل" ; 
    } else {
        $('input[type="checkbox"]', '#topics').prop('checked', true);
        document.getElementById('selectAll').value="إلغاء التحديد" ; 

    }
    $(this).toggleClass('allChecked');
  })
});
</script>

</html>