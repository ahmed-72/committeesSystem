@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','منظومة اللجان')

@section('main_path','اللجان')
@section('sub_path','تفاصيل اللجنة')



@section('styles')
<style>
    .app-container,
    .app-toolbar {
        direction: rtl;
    }

    .fonts {
        font-size: 16px;
    }

    .sumTaskNums {
        margin-right: 5px;
        font-size: 15px;
    }

    .sumTaskStatus {
        font-size: 20px;
        margin-right: 5px;
    }

    .card-header {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<?php
$done = $notDiscussed = $tracking = $inProgress = 0;
$watining=array();
?> <?php
            foreach ($committee->discussiontopics as $topic) {
                if ($topic->isDiscussed == 'done') $done++;
                if ($topic->isDiscussed == 'notDiscussed'){ $notDiscussed++;
                $watining[]=$topic;}
                if ($topic->isDiscussed == 'tracking'){ $tracking++;
                    $watining[]=$topic;}
                if ($topic->isDiscussed == 'inProgress') $inProgress++;
            } 
            ?>

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-xxl-12">
                        <!--begin::Engage widget 10-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Body-->
                            <div class="card-body pt-9 pb-0">
                                <!--begin::Details-->
                                <div class="d-flex flex-wrap flex-sm-nowrap">
                                    <!--begin::Info-->
                                    <div class="flex-grow-1">
                                        <!--begin::Title-->
                                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                            <!--begin::User-->
                                            <div class="d-flex flex-column">
                                                <!--begin::Name-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="currentColor"></path>
                                                            <path d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$committee->committeeName}}</a>
                                                    @if($committee->status == 'active')
                                                    <span style="margin-right: 10px" class="fonts badge badge-light-success">نشطة</span>
                                                    @else
                                                    <span style="margin-right: 10px" class="fonts badge badge-light-danger">غير نشطة</span>
                                                    @endif

                                                </div>
                                                <!--end::Name-->

                                            </div>
                                            <!--end::User-->
                                            <!--begin::Actions-->
                                            <div class="d-flex my-4">
                                                <a href="{{route('showCommittee')}}" class="btn btn-sm btn-light me-2" id="">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                    <span class="svg-icon svg-icon-3 d-none">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                                            <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Indicator label-->
                                                    <span class="fonts indicator-label">رجوع</span>
                                                    <!--end::Indicator label-->
                                                    <!--begin::Indicator progress-->
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator progress-->
                                                </a>
                                                <a href="{{route('updatecommittee.edit',$committee->committeeID)}}" class="fonts btn btn-sm btn-primary me-2">تعديل
                                                    اللجنة</a>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                                <!--begin::Stats-->
                                                <div class="d-flex flex-wrap">
                                                    <!--begin::Stat-->
                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <div class="fs-2 fw-bold counted">
                                                                {{$committee->committeeID}}
                                                            </div>
                                                        </div>
                                                        <!--end::Number-->
                                                        <!--begin::Label-->
                                                        <div class="fw-semibold fs-6 text-gray-600">رقم اللجنة
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                    <!--begin::Stat-->
                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <div class="fs-2 fw-bold counted">
                                                                {{$committee->committeeDate}}
                                                            </div>
                                                        </div>
                                                        <!--end::Number-->
                                                        <!--begin::Label-->
                                                        <div class="fw-semibold fs-6 text-gray-600">تاريخ اصدار قرار
                                                            انشاء اللجنة
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Navs-->
                                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="fonts nav-link text-active-primary ms-0 me-10 py-5 active" href="#">المعلومات الاساسية</a>
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="fonts nav-link text-active-primary ms-0 me-10 py-5" href="#members">الأعضاء</a>
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="fonts nav-link text-active-primary ms-0 me-10 py-5" href="#tasks">المهام</a>
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="fonts nav-link text-active-primary ms-0 me-10 py-5 " href="#regulations">الضوابط</a>
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="fonts nav-link text-active-primary ms-0 me-10 py-5" href="#topics">الجلسات</a>
                                    </li>
                                    <!--end::Nav item-->
                                </ul>
                                <!--begin::Navs-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>


                    <div class="col-lg-10" >
                        <!--begin::Engage widget 10-->
                        <div class="card card-flush h-md-100" id="members">
                            <!--begin::Body-->
                            <div class="card-header">
                                <!--begin::Card header-->
                                <div class="card-title fs-3 fw-bold" >تفاصيل الأعضاء</div>
                                <!--end::Card header-->
                            </div>
                            <div style="padding: 0 50px 50px" class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <!-- <th>رقم العضو</th> -->
                                            <th>اسم العضو</th>
                                            <th> الصفة</th>
                                            <th> التوصيف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($committee->members as $member)
                                        <tr id="deleteMember">
                                            <td>{{$member->employee->employeeName}}</td>
                                            <td>{{$member->employee->employeeJobTitle}}</td>
                                            <td>{{$member->memberDescription}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>

                    <div class="col-lg-10">
                        <!--begin::Engage widget 10-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Body-->
                            <div class="card-header">
                                <!--begin::Card header-->
                                <div class="card-title fs-3 fw-bold" id="tasks">تفاصيل المهام</div>
                                <!--end::Card header-->
                            </div>
                            <div style="padding: 0 50px 50px" class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <!-- <th>رقم العضو</th> -->
                                            <th>رقم المهمة</th>
                                            <th>تفاصيل المهمة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($committee->tasks as $task)
                                        <tr id="deleteTask">
                                            <td>{{$task->taskID}}</td>
                                            <td>{{$task->taskDescription}}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>

                    <div class="col-lg-10">
                        <!--begin::Engage widget 10-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Body-->
                            <div class="card-header">
                                <!--begin::Card header-->
                                <div class="card-title fs-3 fw-bold" id="regulations">تفاصيل الضوابط</div>
                                <!--end::Card header-->
                            </div>
                            <div style="padding: 0 50px 50px" class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <!-- <th>رقم العضو</th> -->
                                            <th>رقم الضابط</th>
                                            <th>تفاصيل الضابط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($committee->regulations as $regulation)
                                        <tr id="deleteRegulation">
                                            <td>{{$regulation->regulationID}}</td>
                                            <td>{{$regulation->regulationDescription}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>

                    <div class="col-lg-6">
                        <!--begin::Tasks-->
                        <div class="card card-flush h-lg-100" id="topics">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">المواضيع الحالية</h3>
                                    <div class="fs-6 text-gray-600">اجمالي <?php echo $notDiscussed + $tracking ?> موضوع بانتظار مناقشتها</div>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{route('showSessionTopics',$committee->committeeID)}}" class="btn btn-bg-light btn-active-color-primary btn-sm">عرض
                                        الكل</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-column mb-9 p-9 pt-3">
                                <!--begin::Item-->
                                @foreach($watining as $wati)
                                <div class="d-flex align-items-center position-relative mb-7">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->
                                    
                                    <!--begin::Details-->
                                  
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">{{$wati->topicDescription}}</a>
                                        <!--begin::Info-->
                                        <div class="text-gray-600">
                                            <a href="#">{{$wati->ResolutionDescription}}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->
                                    
                                </div>@endforeach
                                <!--end::Item-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Tasks-->
                    </div>
                    <div class="col-lg-6">
                        <!--begin::Summary-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">ملخص المواضيع</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="{{route('showSessionTopics',$committee->committeeID)}}" class="btn btn-light btn-sm">عرض الكل</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div style="margin-top: -25px" class="card-body p-9 pt-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Chart-->
                                    <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                                        <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                            <span class="fs-2qx fw-bold">{{$committee->discussiontopics->count()}}</span>
                                            <span class="fs-6 fw-semibold text-gray-600">اجمالي المواضيع</span>
                                        </div>
                                        <canvas id="project_overview_chart" width="175" height="175" style="display: block; box-sizing: border-box; height: 175px; width: 175px;"></canvas>
                                    </div>
                                    <!--end::Chart-->
                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-primary me-3"></div>
                                            <div class="sumTaskStatus text-gray-600">نشطة</div>
                                            <div id="topicActive" class="sumTaskNums ms-auto fw-bold text-gray-900"></div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-success me-3"></div>
                                            <div class="sumTaskStatus text-gray-600">مكتملة
                                            </div>
                                            <div id="topicCompleted" class="sumTaskNums ms-auto fw-bold text-gray-900"></div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-danger me-3"></div>
                                            <div class="sumTaskStatus text-gray-600">متأخرة</div>
                                            <div id="topicLater" class="sumTaskNums ms-auto fw-bold text-gray-900"></div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div style="color: gray" class="bullet bg-gray-300 me-3"></div>
                                            <div class="sumTaskStatus text-gray-600">لم يتم مناقشتها</div>
                                            <div id="noYet" class="sumTaskNums ms-auto fw-bold text-gray-900"></div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Summary-->
                    </div>

                    <div style="width: auto" class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">الجلسات القادمة</h3>
                                    @if(count($nearSessions)>0)
                                    <div class="fs-6 text-gray-600">اجمالي الجلسات القادمة : {{count($nearSessions)}} </div>
                                    <br>
                                    <a href="{{route('addSession.create',$committee->committeeID)}}" class="btn btn-sm btn-primary me-3">انشاء
                                        جلسة</a><br>
                                    <a href="{{route('showSessions',$committee->committeeID)}}" class="btn btn-sm btn-primary me-3">عرض كافة الجلسات</a>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div style="margin-right: 30px" class="card-toolbar">
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_0" class="tab-pane fade show" role="tabpanel">

                        
                                        @foreach($nearSessions as $session)
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-5px bg-secondary rounded top-0"></div>
                                            <!--end::Bar-->
                                            <!--begin::Info-->
                                            <div style="margin-right: 20px" class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">{{$session->sessionDate}}</a>
                                                <!--end::Title-->
                                                <!--begin::Time-->
                                                <div class="fs-5">{{$session->sessionStartAt}}
                                                    <span class="fs-7 text-gray-600 text-uppercase">pm</span>
                                                </div>
                                                <!--end::Time-->
                                                
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Action-->
                                            
                                                @if($session->status == 'ready')
                                                <a class="btn btn-bg-light btn-active-color-primary btn-sm" href="{{route('sessionReport.create',['committeeID'=>$session->committee_committeeID ,'sessionID'=>$session->sessionID])}}">
                                                افتتاح الجلسة
                                                @elseif($session->status == 'dead')
                                                <a class="btn btn-bg-light btn-active-color-primary btn-sm"  href="{{route('printReport',['committeeID'=>$session->committee_committeeID ,'sessionID'=>$session->sessionID])}}">
                                                معاينة وطباعة محضر الجلسة
                                                @elseif($session->status == 'inProgress') 
                                                <a class="btn btn-bg-light btn-active-color-primary btn-sm"  href="{{route('prepareSession',['committeeID'=>$session->committee_committeeID ,'sessionID'=>$session->sessionID])}}"> 
                                                تحضير
                                                @else
                                                @endif
                                            </a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        @endforeach
                                    </div>
                                    <!--end::Day-->
                                </div>
                                <!--end::Card toolbar-->
                                @else 
                                <div class="fs-6 text-gray-600">ليس هنالك أي جلسات قادمة قريبة </div>
                                    <br>
                                @endif
                            </div>
                            <!--end::Card header-->
                            
                        </div>
                        <!--end::Card-->
                        
                    </div>
                    <!--end::Col-->
        
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->
@endsection

@section('scripts')

<script>
    //discussiontopics isDiscussed  notDiscussed done tracking inProgress
    // init chart 


    let element = document.getElementById("project_overview_chart");

    $('#topicActive').html("<?php echo $inProgress ?>");
    $('#topicCompleted').html("<?php echo $done ?>");
    $('#topicLater').html("<?php echo $tracking ?>");
    $('#noYet').html("<?php echo $notDiscussed ?>");


    let config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    <?php echo $inProgress  ?>, <?php echo  $done ?>, <?php echo $tracking ?>, <?php echo $notDiscussed ?>,
                ],
                backgroundColor: ['#009ef7', '#50cd89', '#f1416c', 'gray']
            }],
            labels: ['Active', 'Completed', 'failed', 'Yet to start']
        },
        options: {
            chart: {
                fontFamily: 'inherit'
            },
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            title: {
                display: false
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10,
                caretPadding: 0,
                displayColors: false,
                backgroundColor: '#20D489',
                titleFontColor: '#ffffff',
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };

    let ctx = element.getContext('2d');
    let myDoughnut = new Chart(ctx, config);
</script>
@endsection