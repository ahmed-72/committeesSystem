@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
@endsection

@section('content')
<!-- <ul>
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

</ul> -->
<div dir="rtl">
    <h2>{{$committee->committeeID}}</h2>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor"
                                class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <a href="#" class="h1 fw-bold text-hover-primary text-gray-900 m-0">الأعضاء</a>
                        <!--end::Title-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar m-0">
                        <!--begin::Menu-->
                        <button type="button"
                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3 "
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                                        </path>
                                    </svg>
                                </a>
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
                        <span
                            class="badge bg-light text-gray-700 px-3 py-2 me-2">{{$member->employee->employeeJobTitle}}</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-layout-text-window" viewBox="0 0 16 16">
                                <path
                                    d="M3 6.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v1H1V2a1 1 0 0 1 1-1h12zm1 3v10a1 1 0 0 1-1 1h-2V4h3zm-4 0v11H2a1 1 0 0 1-1-1V4h10z" />
                            </svg>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <a href="#" class="h1 fw-semi text-hover-primary text-gray-900 m-0">الجلسات</a>
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
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
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
                                    class="menu-link flex-stack px-3">
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        aria-label="Specify a target name for future usage and reference"
                                        data-kt-initialized="1"></i></a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{route('addDiscussionTopics.create',$committee->committeeID)}}"
                                    class="menu-link px-3">اضف موضوعاً للنقاش في الجلسة القادمة
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-journal-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                        <path
                                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    </svg></a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{route('addSession.create',$committee->committeeID)}}"
                                    class="menu-link px-3 ">أنشئ جلسة جديدة&emsp;&ensp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                        class="bi bi-calendar-plus " viewBox="0 0 16 16">
                                        <path
                                            d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z">
                                        </path>
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z">
                                        </path>
                                    </svg></a>
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
                    <div class="fs-2 fw-bold text-info mb-3"> إجمالي الجلسات :{{$committee->sessions->count()}} منها:
                        {{count($nearSessions)}} في نطاق اسبوع</div>
                    <!--end::Heading-->
                    @foreach($nearSessions as $session)

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
                        @if($session->status == 'dead') <a href="{{route('printReport',$session->sessionID )}}"><span
                                class="btn  btn-outline btn-outline-dashed btn-outline-primary btn-active-primary text-gray-700 px-3 py-2 me-2">معاينة
                                و طباعة محضر الجلسة</span></a>@endif
                        @if($session->status == 'inProgress')<a
                            href="{{route('prepareSession',['committeeID'=>$committee->committeeID ,'sessionID'=>$session->sessionID] )}}"><span
                                class="btn  btn-outline btn-outline-dashed btn-outline-primary btn-active-primary text-gray-700 px-3 py-2 me-2">تحضير
                                الجلسة</span></a>@endif
                        @if($session->status == 'ready') <a
                            href="{{route('sessionReport.create',['committeeID'=>$committee->committeeID ,'sessionID'=>$session->sessionID]  )}}"><span
                                class="btn  btn-outline btn-outline-dashed btn-outline-primary btn-active-primary text-gray-700 px-3 py-2 me-2">افتتاح
                                الجلسة</span></a>@endif

                    </div>
                    @endforeach
                    <a href="{{route('showSessions',$committee->committeeID )}}"
                        class="btn btn-sm fw-bold btn-primary w-50 h-50">عرض كل الجلسات</a>
                    <!--end::Stats-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::row-->
    <br><br>
    <!--begin::row-->
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-list-ol" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                            </svg>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <a href="#" class="h1 fw-bold text-hover-primary text-gray-900 m-0">المهمات</a>
                        <!--end::Title-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar m-0">
                        <!--begin::Menu-->
                        <button type="button"
                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3 "
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
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
                                    class="menu-link flex-stack px-3">تعديل المهمام
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                                        </path>
                                    </svg>
                                </a>
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
                    <div class="fs-2 fw-bold text-info mb-3">{{$committee->tasks->count()}} مهمات</div>
                    <!--end::Heading-->
                    @foreach($committee->tasks as $task)
                    <!--begin::Stats-->
                    <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                        <!--SVG file not found: icons/duotune/arrows/Up-right.svg-->
                        <!--begin::Number-->
                        <div class="fw-bold text-info me-2">{{$task->taskID}} - </div>
                        <!--end::Number-->
                        <!--begin::Label-->
                        <div class="fs-4 fw-semibold text-gray-700"> {{$task->taskDescription}}</div>

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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-list-ol" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                            </svg>
                        </div>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <a href="#" class="h1 fw-bold text-hover-primary text-gray-900 m-0">الضوابط</a>
                        <!--end::Title-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar m-0">
                        <!--begin::Menu-->
                        <button type="button"
                            class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3 "
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
                                        </rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3">
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
                                    class="menu-link flex-stack px-3">تعديل الضوابط
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                                        </path>
                                    </svg>
                                </a>
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
                    <div class="fs-2 fw-bold text-info mb-3">{{$committee->regulations->count()}} ضابط</div>
                    <!--end::Heading-->
                    @foreach($committee->regulations as $regulation)
                    <!--begin::Stats-->
                    <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                        <!--SVG file not found: icons/duotune/arrows/Up-right.svg-->
                        <!--begin::Number-->
                        <div class="fw-bold text-info me-2">{{$regulation->regulationID}} - </div>
                        <!--end::Number-->
                        <!--begin::Label-->
                        <div class="fs-4 fw-semibold text-gray-700"> {{$regulation->regulationDescription}}</div>

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
    </div>
    <br><br>

    @endsection

    @section('scripts')
    @endsection