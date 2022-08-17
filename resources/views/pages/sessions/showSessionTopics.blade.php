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
    @if(count($topics)>0)
    <h5>المواضيع الخاصة بالجلسة رقم{{$topics[0]['session_sessionID']}} للجنة رقم{{$topics[0]['committee_committeeID']}}
    </h5>
    <div class="col-9 p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>رقم الموضوع</th>
                    <th>وصف الموضوع</th>
                    <th>رقم الموظف الذي طرح الموضوع </th>
                   <th>التنسيب</th>
                   <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->topicID}}</td>
                    <td>{{$topic->topicDescription}}</td>
                    <td>{{$topic->employee_employeeID}}</td>
                    <td>{{$topic->employee->employeeJobTitle}}</td>
                    <td>{{$topic->isDiscussed}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if(count($topics)==0)
    <h5 class="col-9 alert alert-danger">لا يوجد بعد مواضيع مطروحة للنقاش في هذه الجلسة</h5>
    <button type="button" class="btn btn-info d-inline m-2"><a href="{{ url()->previous() }}">عودة</a></button>
    <button type="button" class="btn btn-info d-inline m-2"><a href="{{ route('addDiscussionTopics.create')}}">إضافة مواضيع للنقاش</a></button>
    @endif

</body>

</html>