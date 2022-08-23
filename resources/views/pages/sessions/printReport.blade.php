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
        min-width: 20px;
        text-align: center;
        border: none;
    }
    @media print {}

body {

  max-width: 595px;
  margin: auto;
  background: white;
  padding: 10px;
      
    }
img{
    width: 80px;
    height: 80px;
}


    </style>
</head>

<body dir="rtl">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="navbar-brand">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Coat_of_arms_of_State_of_Palestine_%28Official%29.png"
                width="40" height="40" class="d-inline-block align-top" alt="">
        </div>
        <h5 class="my-0 mr-md-auto font-weight-normal">وزارة الأوقاف و الشؤون الدينية</h5>

        <div class="navbar-brand">
            <img src="https://palsawa.com/uploads/images/2y3r0.jpg" width="40" height="40"
                class="d-inline-block align-top" alt="">
        </div>

    </div>
    <div class="col-7 mr-auto  ml-3 mt-3">

<div class="mt-3">
    <table>
        <thead>
            <tr>
                <th >م.</th>
                <th >الاسم</th>
                <th >التوصيف</th>
                <th>الحضور</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{$member->memberID}}</td>
                <td>{{$member->member->employee->employeeName}}</td>
                <td>{{$member->member->employee->employeeJobTitle}}</td>
                <td>{{$member->attendee}}</td>
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
               
            </tr>
        </thead>
        <tbody>
            <tr>

                <td rowspan="4"><label >{{$topic->discussiontopic_topicID}}</label></td>
                <td rowspan="4"> <label >{{$topicDetails[$topic->discussiontopic_topicID][0]->topicDescription}}<br>{{$topicDetails[$topic->discussiontopic_topicID][0]->ResolutionDescription}} </label > </td>
                <th colspan="6">المداولات</th>
                <!-- `deliberations`, `decisions`, `executionDepartment`, `executionDeadline -->
            </tr> 
            <tr> 
                <td colspan="6"><label cols="70" rows="5" for="">{{$topic->deliberations}}</label></td>
            </tr>
            <tr>
                <th colspan="3">القرارت</th>
                <th>جهة التنفيذ</th>
                <th>اجل التنفيذ</th>
            </tr>
            <tr> 
                <td colspan="3"> <label for="" cols="50" rows="5">{{$topic->decisions}} </label></td>
                <td><label for="">{{$topic->executionDepartment}}</label></td>
                <td><label for="">{{$topic->executionDeadline}}</label></td>
            </tr>

        </tbody>

    </table>
    @endforeach
</div>
    </div>

</body>

</html>