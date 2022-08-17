@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Home')

@section('main_path','home')
@section('sub_path','home page')



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
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::Engage widget 10-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Body-->
                                <div
                                    class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                    style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                    <!--begin::Wrapper-->
                                    <div class="crad">
                                       
                                    </div>
                                    <div class="mb-10">
                                        <!--begin::Title-->
                                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                                            <span class="me-2">Hello World !!<br/>
                                                <span class="me-2">New</span>
                                                <span class="position-relative d-inline-block text-danger">
                                                    <a href="" class="text-danger opacity-75-hover">Laravel</a>
                                                    <!--begin::Separator-->
                                                    <span
                                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                                    <!--end::Separator-->
                                                </span>
                                            </span>project
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--begin::Wrapper-->
                                    <!--begin::Illustration-->
                                    <img class="mx-auto h-150px h-lg-200px theme-light-show"
                                         src="assets/media/illustrations/misc/upgrade.svg" alt=""/>
                                    <img class="mx-auto h-150px h-lg-200px theme-dark-show"
                                         src="assets/media/illustrations/misc/upgrade-dark.svg" alt=""/>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Engage widget 10-->
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
@endsection