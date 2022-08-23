@extends('pages.parent')

@section('title','عرض جلساتي')

@section('page_name','منظومة اللجان')

@section('main_path','الجلسات')
@section('sub_path','عرض جلساتي')



@section('styles')

<style>
.app-toolbar {
    direction: rtl;
}

.form span {
    font-size: 20px;
}
</style>

@endsection

@section('content')

<div dir="rtl" id="kt_app_content" class="app-content flex-column-fluid" data-select2-id="select2-data-kt_app_content">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Contacts App- Add New Contact-->
        <div class="row g-7" data-select2-id="select2-data-127-s6zt">
            <!--begin::Content-->
            <div class="col-xl-12" data-select2-id="select2-data-126-xy7q">
                <!--begin::Contacts-->
                <div class="card card-flush h-lg-100" id="kt_contacts_main"
                    data-select2-id="select2-data-kt_contacts_main">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-1 me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.3"
                                        d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <h2 style="margin: 10px 5px 0 0;">عرض جلساتي</h2>

                            <div class="d-flex align-items-center gap-2 gap-lg-3 px-3">
                                <a href="#previousSessions" class="btn btn-sm fw-bold btn-primary">الجلسات السابقة</a>
                                <a href="#upcomingSessions" class="btn btn-sm fw-bold btn-primary">الجلسات القادمة</a>
                            </div>
                        </div>
                        <!--end::Card title-->

                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-5" data-select2-id="select2-data-125-c05l">
                        <!--begin::Form-->
                        <hr>
                        <br><br>
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div id="kt_project_users_card_pane" class="tab-pane fade active show" role="tabpanel">
                                <h1 id="upcomingSessions">الجلسات القادمة:</h1>
                                <hr class="col-3">

                                <!--begin::Row-->
                                <div class="row g-6 g-xl-9">
                                    @foreach($upcomingSessions as $upcomingSession)

                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                        <!--begin::Card-->
                                        <div class="card shadow-sm card-bordered">
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                                <!--begin::Name-->
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$upcomingSession->committee->committeeName}}</a>
                                                <!--end::Name-->
                                                <!--begin::Position-->
                                                <?php $created_at=$upcomingSession->created_at->diffForHumans() ; 
                                                $number=substr($upcomingSession->created_at->diffForHumans(),0,2) ;
                                              
                                                if (str_contains($created_at, 'day')&& $number=='1 ') 
                                                $created_at='يومٍ مضى'; 
                                                elseif (str_contains($created_at, 'days')&& $number=='2 ') 
                                                $created_at='يومين مضيا';
                                                elseif (str_contains($created_at, 'days')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أيامٍ مضت';

                                                elseif (str_contains($created_at, 'week')&& $number=='1 ') 
                                                $created_at='أسبوعٍ مضى'; 
                                                elseif (str_contains($created_at, 'weeks')&& $number=='2 ') 
                                                $created_at='أسبوعين مضيا';
                                                elseif (str_contains($created_at, 'weeks')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أسابيعٍ مضت';

                                                elseif (str_contains($created_at, 'month')&& $number=='1 ') 
                                                $created_at='شهرٍ مضى'; 
                                                elseif (str_contains($created_at, 'months')&& $number=='2 ') 
                                                $created_at='شهرين مضيا';
                                                elseif (str_contains($created_at, 'months')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أشهرٍ مضت';
                                                
                                                elseif (str_contains($created_at, 'year')&& $number=='1 ') 
                                                $created_at='سنةٍ مضى'; 
                                                elseif (str_contains($created_at, 'years')&& $number=='2 ') 
                                                $created_at='سنتين مضتا';
                                                elseif (str_contains($created_at, 'years')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'سنينٍ مضت';

                                                ?>
                                                <div class="fw-semibold text-gray-400 mb-6"> جلسة رقم
                                                    {{$upcomingSession->sessionID}} أنشئت قبل {{$created_at}}</div>
                                                <!--end::Position-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-center flex-wrap">
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$upcomingSession->sessionDate}}</div>
                                                        <div class="fw-semibold text-gray-400">تاريخ الانعقاد</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$upcomingSession->sessionRoom}}</div>
                                                        <div class="fw-semibold text-gray-400">المكان</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$upcomingSession->sessionStartAt}} -
                                                            {{$upcomingSession->sessionEndAt}}</div>
                                                        <div class="fw-semibold text-gray-400">الزمان</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Info-->
                                                <div class="d-flex my-4">
                                                    @if($upcomingSession->status == 'dead') <a
                                                        href="{{route('printReport',$upcomingSession->sessionID )}}"><span
                                                            class="fonts btn btn-sm btn-primary me-2">معاينة
                                                            و طباعة محضر الجلسة</span></a>@endif
                                                    @if($upcomingSession->status == 'inProgress')<a
                                                        href="{{route('prepareSession',['committeeID'=>$upcomingSession->committee_committeeID ,'sessionID'=>$upcomingSession->sessionID] )}}"><span
                                                            class="fonts btn btn-sm btn-primary me-2">تحضير
                                                            الجلسة</span></a>@endif
                                                    @if($upcomingSession->status == 'ready') <a
                                                        href="{{route('sessionReport.create',['committeeID'=>$upcomingSession->committee_committeeID ,'sessionID'=>$upcomingSession->sessionID]  )}}"><span
                                                            class="fonts btn btn-sm btn-primary me-2">افتتاح
                                                            الجلسة</span></a>@endif
                                                    @if($upcomingSession->status == 'later') <a
                                                        href="{{route('addDiscussionTopics.create',['committeeID'=>$upcomingSession->committee_committeeID])}}"><span
                                                            class="fonts btn btn-sm btn-primary me-2">اضافة مواضيع
                                                            للنقاش</span></a>@endif
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    @endforeach
                                </div>
                                <!--end::Row-->
                                <h1 class="pt-5" id="previousSessions">الجلسات السابقة:</h1>
                                <hr class="col-3">
                                <!--begin::Row-->
                                <div class="row g-6 g-xl-9">
                                    @foreach($previousSessions as $previousSession)

                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                        <!--begin::Card-->
                                        <div class="card shadow-sm card-bordered">
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                                <!--begin::Name-->
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$previousSession->committee->committeeName}}</a>
                                                <!--end::Name-->
                                                <!--begin::Position-->
                                                <?php $created_at=$upcomingSession->created_at->diffForHumans() ; 
                                                $number=substr($upcomingSession->created_at->diffForHumans(),0,2) ;
                                              
                                                if (str_contains($created_at, 'day')&& $number=='1 ') 
                                                $created_at='يومٍ مضى'; 
                                                elseif (str_contains($created_at, 'days')&& $number=='2 ') 
                                                $created_at='يومين مضيا';
                                                elseif (str_contains($created_at, 'days')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أيامٍ مضت';

                                                elseif (str_contains($created_at, 'week')&& $number=='1 ') 
                                                $created_at='أسبوعٍ مضى'; 
                                                elseif (str_contains($created_at, 'weeks')&& $number=='2 ') 
                                                $created_at='أسبوعين مضيا';
                                                elseif (str_contains($created_at, 'weeks')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أسابيعٍ مضت';

                                                elseif (str_contains($created_at, 'month')&& $number=='1 ') 
                                                $created_at='شهرٍ مضى'; 
                                                elseif (str_contains($created_at, 'months')&& $number=='2 ') 
                                                $created_at='شهرين مضيا';
                                                elseif (str_contains($created_at, 'months')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'أشهرٍ مضت';
                                                
                                                elseif (str_contains($created_at, 'year')&& $number=='1 ') 
                                                $created_at='سنةٍ مضى'; 
                                                elseif (str_contains($created_at, 'years')&& $number=='2 ') 
                                                $created_at='سنتين مضتا';
                                                elseif (str_contains($created_at, 'years')&& $number!='1 '&& $number!='2 ') 
                                                $created_at=$number.'سنينٍ مضت';

                                                ?>
                                                <div class="fw-semibold text-gray-400 mb-6"> جلسة رقم
                                                    {{$previousSession->sessionID}} أنشئت قبل {{$created_at}}</div>
                                                <!--end::Position-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-center flex-wrap">
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$previousSession->sessionDate}}</div>
                                                        <div class="fw-semibold text-gray-400">تاريخ الانعقاد</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$previousSession->sessionRoom}}</div>
                                                        <div class="fw-semibold text-gray-400">المكان</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-700">
                                                            {{$previousSession->sessionStartAt}} -
                                                            {{$previousSession->sessionEndAt}}</div>
                                                        <div class="fw-semibold text-gray-400">الزمان</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Info-->
                                                <div class="d-flex my-4">
                                                    <a href="{{route('printReport',['committeeID'=>$previousSession->committee_committeeID ,'sessionID'=>$previousSession->sessionID] )}}"><span
                                                            class="fonts btn btn-sm btn-primary me-2">معاينة
                                                            و طباعة محضر الجلسة</span></a>
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    @endforeach
                                </div>
                                <!--end::Row-->

                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts App- Add New Contact-->
    </div>
    <!--end::Content container-->
</div>

@endsection

@section('scripts')
@endsection