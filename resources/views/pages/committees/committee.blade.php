@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
@endsection

@section('content')
{{$committee->committeeID}}
<ul>
    <li>
        sessions:
        <ul>
            @foreach($committee->sessions as $session)
            <li>{{$session->sessionID}}</li>
            @endforeach
        </ul>
    </li>
    <li>
        members:
        <ul>
            @foreach($committee->members as $member)
            <li> {{$member->memberID}}</li>
            @endforeach
        </ul>
    </li>
    <li>
        tasks:
        <ul>
            @foreach($committee->tasks as $task)
            <li> {{$task->taskID}}</li>
            @endforeach
        </ul>
    </li>
    <li>
        requlations:
        <ul>
            @foreach($committee->regulations as $regulation)
            <li> {{$regulation->regulationID}}</li>
            @endforeach
        </ul>
    </li>
    <li>
        topics:
        <ul>
            @foreach($committee->sessionTopics as $sessionTopic)
            <li> {{$sessionTopic->discussiontopic_topicID}}</li>
            @endforeach
        </ul>
    </li>

</ul>
<div class="row g-6 g-xl-9" dir="rtl">
    <!--begin::Col-->
    <div class="col-sm-6 col-xl-5">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <!--begin::Icon-->
                    <div class="symbol symbol-45px w-45px bg-light me-5">
                        <img src="assets/media/svg/brand-logos/twitch.svg" alt="m" class="p-3">
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-semibold text-hover-primary text-gray-600 m-0">Members</a>
                    <!--end::Title-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Menu-->
                    <button type="button"
                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{route('updatecommittee.edit',$committee->committeeID)}}"
                                class="menu-link flex-stack px-3">تعديل الأعضاء
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    aria-label="Specify a target name for future usage and reference"
                                    data-kt-initialized="1"></i></a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                <!--begin::Heading-->
                <div class="fs-2 fw-bold text-info mb-3">{{$committee->members->count()}} أعضاء</div>
                <!--end::Heading-->
                @foreach($committee->members as $member)
                <!--begin::Stats-->
                <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                    <!--SVG file not found: icons/duotune/arrows/Up-right.svg-->
                    <!--begin::Number-->
                    <div class="fw-bold text-info me-2">{{$member->memberID}} - </div>
                    <!--end::Number-->
                    <!--begin::Label-->
                    <div class="fs-4 fw-semibold text-gray-700"> {{$member->employee->employeeName}}</div>
                    <span class="badge bg-light text-gray-700 px-3 py-2 me-2">{{$member->employee->employeeJobTitle}}</span>
                    <span class="badge bg-light text-gray-700 px-3 py-2 me-2">{{$member->memberDescription}}</span>

                    <!--end::Label-->
                </div>
                @endforeach
                <!--end::Stats-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
        <!--begin::Col-->
        <div class="col-sm-6 col-xl-5">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <!--begin::Icon-->
                    <div class="symbol symbol-45px w-45px bg-light me-5">
                        <img src="assets/media/svg/brand-logos/twitch.svg" alt="m" class="p-3">
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-semibold text-hover-primary text-gray-600 m-0">Sessions</a>
                    <!--end::Title-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Menu-->
                    <button type="button"
                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{route('updatecommittee.edit',$committee->committeeID)}}"
                                class="menu-link flex-stack px-3">تعديل الج
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    aria-label="Specify a target name for future usage and reference"
                                    data-kt-initialized="1"></i></a>
                        </div>
                        <div class="menu-item px-3"> 
                            <a href="{{route('addDiscussionTopics.create',$committee->committeeID)}}" class="menu-link px-3">اضف موضوعاً للنقاش في الجلسة القادمة</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                <!--begin::Heading-->
                <div class="fs-2 fw-bold text-info mb-3">{{$committee->sessions->count()}} جلسات</div>
                <!--end::Heading-->
                @foreach($committee->sessions as $session)
                @if($session->status == 'finished')
                <!-- <a href="{{route('printReport',$session->sessionID )}}">  -->
                    @elseif($session->status == 'inProgress')
                <!-- <a href="{{route('prepareSession',['committeeID'=>$committee->committeeID ,'sessionID'=>$session->sessionID] )}}">   -->
                @endif

                <!--begin::Stats-->
                <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                    <!--SVG file not found: icons/duotune/arrows/Up-right.svg-->
                    <!--begin::Number-->
                    <div class="fw-bold text-info me-2">{{$session->sessionID}} - </div>
                    <!--end::Number-->
                    <!--begin::Label-->
                    <div class="fs-4 fw-semibold text-gray-700">{{$session->sessionDate}}</div>
                    <span class="badge bg-light text-gray-700 px-3 py-2 me-2">{{$session->sessionRoom}}</span>
                    <!--end::Label-->
                    @if($session->status == 'finished')<span class="btn  btn-outline btn-outline-dashed btn-outline-primary btn-active-primary text-gray-700 px-3 py-2 me-2">معاينة و طباعة محضر الجلسة</span>@endif
                    @if($session->status == 'inProgress')<span class="btn  btn-outline btn-outline-dashed btn-outline-primary btn-active-primary text-gray-700 px-3 py-2 me-2">تحضير الجلسة</span>@endif
                </div>
                @if($session->status == 'finished')</a>@endif
                @endforeach
                <!--end::Stats-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
</div>







</div>
<!--begin::Col-->
<div class="row g-6 g-xl-9 " dir="rtl">
    <!--begin::Col-->
    <div class="col-sm-6 col-xl-4">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <!--begin::Icon-->
                    <div class="symbol symbol-45px w-45px bg-light me-5">
                        <img src="assets/media/svg/brand-logos/twitch.svg" alt="m" class="p-3">
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-semibold text-hover-primary text-gray-600 m-0">Members</a>
                    <!--end::Title-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Menu-->
                    <button type="button"
                        class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                        data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="menu-item px-3">
                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Create Invoice</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link flex-stack px-3">Create Payment
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    aria-label="Specify a target name for future usage and reference"
                                    data-kt-initialized="1"></i></a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Generate Bill</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                            <a href="#" class="menu-link px-3">
                                <span class="menu-title">Subscription</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Plans</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Statements</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3">
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                                checked="checked" name="notifications">
                                            <!--end::Input-->
                                            <!--end::Label-->
                                            <span class="form-check-label text-muted fs-6">Recuring</span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-1">
                            <a href="#" class="menu-link px-3">Settings</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                <!--begin::Heading-->
                <div class="fs-2 fw-bold text-info mb-3">{{$committee->members->count()}} أعضاء</div>
                <!--end::Heading-->
                @foreach($committee->members as $member)
                <!--begin::Stats-->
                <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                    <!--SVG file not found: icons/duotune/arrows/Up-right.svg-->
                    <!--begin::Number-->
                    <div class="fw-bold text-info me-2">{{$member->memberID}}</div>
                    <!--end::Number-->
                    <!--begin::Label-->
                    <div class="fs-4 fw-semibold text-gray-700">{{$member->employee->employeeName}}</div>
                    <!--end::Label-->
                </div>
                @endforeach
                <!--end::Stats-->
                <!--begin::Indicator-->
                <div class="d-flex align-items-center fw-semibold">
                    <span class="badge bg-light text-gray-700 px-3 py-2 me-2">0.5%</span>
                    <span class="text-gray-400 fs-7">MRR</span>
                    <i class="fas fa-exclamation-circle fs-7 ms-2" data-bs-toggle="tooltip" aria-label="Recurring"
                        data-kt-initialized="1"></i>
                </div>
                <!--end::Indicator-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
</div>

@endsection

@section('scripts')
@endsection