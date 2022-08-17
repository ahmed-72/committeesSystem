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

    <ul class="col-12">
        @foreach($committees as $committee)

        <li >
            <div>
           <h5 class="d-inline"> {{$committee->committeeID}} </h5>
            <button type="button" class="btn btn-info d-inline "><a class="text-decoration-none text-light" href="{{route('updatecommittee.edit',$committee->committeeID)}}">تعديل بيانات اللجنة</a></button>
            <button type="button" class="btn btn-info d-inline "><a class="text-decoration-none text-light" href="{{route('deletecommittee',$committee->committeeID)}}"> حذف اللجنة</a></button>
            </div>
        </li>
        @if(!empty($committee->tasks))
        <ul style="list-style-type:none;">
            <li><h6 class="pt-2">مهمات اللجنة:</h6></li>
            <li>
                @php $tasks=$committee->tasks @endphp
                <ol class="">
                    @foreach($tasks as $task)

                    <li>{{$task->taskDescription}}</li>

                    @endforeach
            </li>
            </ol>
        </ul>
        @endif

        @if(!empty($committee->regulations))
        <ul style="list-style-type:none;">
        <li><h6 class="pt-2">ضوابط اللجنة:</h6></li>
            <li>
                @php $regulations=$committee->regulations @endphp
                <ol >
                    @foreach($regulations as $regulation)

                    <li>{{$regulation->regulationDescription}}</li> 

                    @endforeach
            </li>
            </ol>
        </ul>
        @endif
     
        @if(!empty($committee->members))
        <ul style="list-style-type:none;">
        <li><h6 class="pt-2">أعضاء اللجنة:</h6></li>
            <li>
                @php $members=$committee->members @endphp
                <ol>
                    @foreach($members as $member)
                    @php $employees=$member->employee @endphp
                    <li>{{$employees->employeeName}}  بصفته {{$member->memberDescription}}</li>
                    @endforeach
            </li>
            </ol>
        </ul>
        @endif

        @if(!empty($committee->sessions))
        <ul style="list-style-type:none;">
        <li><h6 class="pt-2">جلسات اللجنة:</h6></li>
            <li>
                @php $sessions=$committee->sessions @endphp
                <ol>
                    @foreach($sessions as $session)
                    <li class="d-inline">الجلسة رقم {{$session->sessionID}} في تاريخ {{$session->sessionDate}} تبدأ الساعة {{$session->sessionStartAt}} و تنتهي الساعة {{$session->sessionEndAt}} في قاعة {{$session->sessionRoom}}</li>
                    <button type="button" class="btn btn-info d-inline mt-2"><a class="text-decoration-none text-light" href="{{route('showSessionTopics',['committeeID'=>$committee->committeeID,'sessionID'=>$session->sessionID])}}">مواضيع النقاش في هذه الجلسة</a></button>
                    <button type="button" class="btn btn-info d-inline mt-2"><a class="text-decoration-none text-light" href="{{route('prepareSession',['committeeID'=>$committee->committeeID,'sessionID'=>$session->sessionID])}}">   تحضير مواضيع هذه الجلسة</a></button>

<br>
                    @endforeach
            </li>
            </ol>
        </ul>
        @endif
        
        <br>
        @endforeach
    </ul>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>