@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','الصفحة الرئيسية')

@section('main_path','الصفحة الرئيسية')
@section('sub_path','')



@section('styles') 
@endsection

@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div dir="rtl" id="kt_app_content" class="app-content flex-column-fluid"
                data-select2-id="select2-data-kt_app_content">
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
                                        <span class="svg-icon svg-icon-3x mr-5">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-heart.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z"
                                                        fill="skyblue" opacity="0.3"></path>
                                                    <path
                                                        d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                        fill="currentColor"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <!--end::Svg Icon-->
                                        <h2 style="margin: 10px 5px 0 0;">مرحباً {{Auth::user()->name}}</h2>

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
                                        <div id="kt_project_users_card_pane" class="tab-pane fade active show"
                                            role="tabpanel">
                                            <!--begin::Row-->
                                            <div class="row g-6 g-xl-9">

                                                <!--begin::Col-->
                                                <div class="col-md-6 col-xxl-4">
                                                    <!--begin::Card-->
                                                    <div class="card shadow-sm card-bordered">
                                                        <!--begin::Card body-->
                                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                                            <!--begin::Name-->
                                                            <a href="#"
                                                                class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">جلسات
                                                                اللجان لهذا اليوم</a>
                                                            <!--end::Name-->
                                                            @if($upcomingSessions ==null)
                                                            <div
                                                                class="fs-4 text-gray-800 text-hover-primary border border-gray-300 border-dashed mb-0 m-4 p-4">
                                                                يبدو انه ليس لديك أي جلسات اليوم</div>
                                                            @else
                                                            @foreach($upcomingSessions as $upcomingSession)
                                                            <!--end::Position-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex flex-center flex-wrap  ">
                                                                <!--begin::Stats-->
                                                                <div
                                                                    class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                                    <div class="fs-6 fw-bold text-gray-700">
                                                                        {{$upcomingSession->committee->committeeName}}
                                                                    </div>
                                                                    <div class="fw-semibold text-gray-400"> جلسة
                                                                        رقم{{$upcomingSession->sessionID}}</div>
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
                                                            @endforeach
                                                            <!--end::Info-->
                                                            <div class="d-flex my-4">
                                                                <a href="{{route('mySessions')}}"><span
                                                                        class="fonts btn btn-sm btn-primary me-2">عرض كل
                                                                        الجلسات</span></a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <!--end::Card body-->
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->

                                                


                                                <!--begin::Col-->
                                                <div class="col-md-6 col-xxl-4">
                                                    <!--begin::Card-->
                                                    <div class="card shadow-sm card-bordered">
                                                        <!--begin::Card body-->

                                                        <!--begin::Name-->
                                                        <a href="https://www.facebook.com/palwakfg"
                                                            class="fs-4 text-gray-800 text-hover-primary fw-bold card-body d-flex flex-center flex-column">آخر
                                                            أخبار الوزارة</a>
                                                        <!--end::Name-->
                                                        <div class="d-flex flex-center flex-wrap fb-page"
                                                            data-href="https://www.facebook.com/palwakfg"
                                                            data-tabs="timeline" data-width="" data-height=""
                                                            data-small-header="false" data-adapt-container-width="true"
                                                            data-hide-cover="false" data-show-facepile="true">
                                                            <blockquote cite="https://www.facebook.com/palwakfg"
                                                                class="fb-xfbml-parse-ignore"><a
                                                                    href="https://www.facebook.com/palwakfg">‏وزارة
                                                                    الأوقاف والشئون الدينية فلسطين‏</a>
                                                            </blockquote>
                                                        </div>

                                                        <!--end::Card body-->
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->
                                                

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
           
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->
@endsection

@section('scripts')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v14.0"
    nonce="0OZb6Rqq"></script>
@endsection