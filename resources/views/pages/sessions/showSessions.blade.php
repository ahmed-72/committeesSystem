@extends('pages.parent')

@section('title','عرض الجلسات')

@section('page_name','منظومة اللجان')

@section('main_path','اللجان')
@section('sub_path','عرض كافة جلسات اللجنة')



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
                            <h2 style="margin: 10px 5px 0 0;">كافة جلسات اللجنة</h2>
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

                                <!--begin::Row-->
                                <div class="row g-6 g-xl-9">
                                    @foreach($sessions as $session)

                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                        <!--begin::Card-->
                                        <div class="card shadow-sm card-bordered">
                                            <!--begin::Card body-->
                                            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                                <!--begin::Name-->
                                                <a href="#"
                                                    class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">جلسة رقم{{$session->sessionID}}</a>
                                                <!--end::Name-->
                                                <!--begin::Position-->
                                                <?php $created_at=$session->created_at->diffForHumans() ; 
                                               
                                                ?>
                                                <div class="fw-semibold text-gray-600 mb-6">
                                                    أنشئت  {{$created_at}}</div>
                                                <!--end::Position-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-center flex-wrap">
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-800">
                                                            {{$session->sessionDate}}</div>
                                                        <div class="fw-semibold text-gray-600">تاريخ الإنعقاد</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-800">
                                                            {{$session->sessionStartAt}}</div>
                                                        <div class="fw-semibold text-gray-600">من الساعة</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-800">
                                                            {{$session->sessionEndAt}}</div>
                                                        <div class="fw-semibold text-gray-600">إلى الساعة</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-800">
                                                            {{$session->sessionRoom}}</div>
                                                        <div class="fw-semibold text-gray-600">المكان</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                                        <div class="fs-6 fw-bold text-gray-800">
                                                            @if($session->status =='dead') جلسة منتهية
                                                            @elseif($session->status =='inProgress') جلسة قادمة خلال يومين
                                                            @elseif($session->status =='ready') جلسة اليوم
                                                            @else  
                                                            @endif
                                                           </div>
                                                        <div class="fw-semibold text-gray-600">الحالة</div>
                                                    </div>
                                                    <!--end::Stats-->
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
                            <div class="d-flex aligan-items-center m-4">
        {{$sessions->links("pagination::bootstrap-5") }}
    </div> 
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
    <!-- <div class="d-flex aligan-items-center m-4">
        {{-- $committees->links("pagination::bootstrap-5") --}}
    </div> -->
    
    <!--end::Content container-->
</div>

@endsection

@section('scripts')
@endsection