@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')
@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
@endsection

@section('content')



<body dir="rtl">

    @if(count($topics)>0)
    <h5>المواضيع الخاصة بلجنة " {{$topics[0]->committee->committeeName}}"</h5>
    <div class="col-9 p-3">
        <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
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
    <button type="button" class="btn btn-info d-inline m-2"><a href="{{ route('addDiscussionTopics.create')}}">إضافة
            مواضيع للنقاش</a></button>
    @endif


    @endsection

    @section('scripts')
    @endsection