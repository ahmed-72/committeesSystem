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
    <style>
    th,
    td {
        border: solid gray 1px;
        text-align: center;
    }

    input.readonly {
        min-width:20px;
        text-align: center;
        border: none;
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

@if($notReady==1)
<h3 class="alert alert-danger col-6">هذه الجلسة لم يحن وقتها بعد</h3>
<div class="mb-0">
    <a href="{{route('mainhome')}}" class="btn btn-sm btn-primary">عودة للصفحة الرئيسية</a>
    <a href="{{ url()->previous()}}" class="btn btn-sm btn-primary">عودة للصفحة السابقة</a>
</div>
@else
    @if($errors->any())
    <ul  class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('sessionReport.store')}}" id="form" method="POST">
            @csrf
            <div class="header">
                <h5 class="input-group mb-3">
                    <span class="input-group-text">إنشاء محضر  جلسة رقم </span>
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
            <div class="col-7 mr-auto  ml-3 mt-3">

                <div class="mt-3">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">م.</th>
                                <th rowspan="2">الاسم</th>
                                <th rowspan="2">التوصيف</th>
                                <th colspan="3">الحضور</th>
                            </tr>
                            <tr>
                                <th>حاضر</th>
                                <th>متغيب</th>
                                <th>معتذر</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td><input type="text" name="memberID[]" class="readonly"readonly value="{{$member->memberID}}"></td>
                                <td>{{$member->employee->employeeName}}</td>
                                <td>{{$member->employee->employeeJobTitle}}</td>
                                <td><input type="radio" name="attendee[{{$member->memberID}}]" value="attendant"></td>
                                <td><input type="radio" name="attendee[{{$member->memberID}}]" value="absent"></td>
                                <td><input type="radio" name="attendee[{{$member->memberID}}]" value="apologized"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="topics">
                    @foreach($topics as $topic)
                    <table>
                        <thead>
                            <tr>
                                <th colspan="1">م.</th>
                                <th colspan="1">البند</th>
                                <th colspan="6">التفاصيل</th>
                                <th colspan="1">متابعة؟</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td rowspan="4"><input type="text" size="1"
                                        name="topicID[{{$topic->discussiontopic_topicID}}]" class="readonly" readonly
                                        value="{{$topic->discussiontopic_topicID}}"></td>
                                <td rowspan="4">
                                    {{$topicDetails[$topic->discussiontopic_topicID][0]->topicDescription}}<br>{{$topicDetails[$topic->discussiontopic_topicID][0]->ResolutionDescription}}
                                </td>
                                <th colspan="6">المداولات</th>
                                <td rowspan="4"><label for="">أُنجزت</label><input type="radio"
                                        name="tracking[{{$topic->discussiontopic_topicID}}]" value="done">
                                    <label for="">متابعة</label><input type="radio"
                                        name="tracking[{{$topic->discussiontopic_topicID}}]" value="tracking">
                                    <label for="">تأجيل .</label><input type="radio"
                                        name="tracking[{{$topic->discussiontopic_topicID}}]" value="delayed">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6"><textarea name="deliberation[{{$topic->discussiontopic_topicID}}]"
                                        cols="70" rows="5"></textarea></td>
                            </tr>
                            <tr>
                                <th colspan="3">القرارت</th>
                                <th>جهة التنفيذ</th>
                                <th>اجل التنفيذ</th>
                            </tr>
                            <tr>
                                <td colspan="3"><textarea name="decision[{{$topic->discussiontopic_topicID}}]" cols="50"
                                        rows="5"></textarea></td>
                                <td><input type="text" name="executionDepartment[{{$topic->discussiontopic_topicID}}]">
                                </td>
                                <td><input type="text" name="executionDeadline[{{$topic->discussiontopic_topicID}}]">
                                </td>
                            </tr>

                        </tbody>

                    </table>
                    @endforeach

                </div>
                <div class="col-5">
                    <hr>
                    <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="أنشئ المحضر">
                </div>
            </div>

        </form>
    </div>
    @endif
</body>

</html>