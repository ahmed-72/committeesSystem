@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','منظومة اللجان')

@section('main_path','اللجان')
@section('sub_path','تفاصيل اللجنة')



@section('styles')
    <style>
        .app-container, .app-toolbar {
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
                                <div class="card-body pt-9 pb-0">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap flex-sm-nowrap">
                                        <!--begin::Info-->
                                        <div class="flex-grow-1">
                                            <!--begin::Title-->
                                            <div
                                                class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                <!--begin::User-->
                                                <div class="d-flex flex-column">
                                                    <!--begin::Name-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24">
																			<path
                                                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                                                fill="currentColor"></path>
																			<path
                                                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                                                fill="white"></path>
																		</svg>
																	</span>
                                                        <!--end::Svg Icon-->
                                                        <a href="#"
                                                           class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$committee->committeeName}}</a>
                                                        @if($committee->committeeStatus == 1)
                                                            <span style="margin-right: 10px"
                                                                  class="fonts badge badge-light-success">نشطة</span>
                                                        @else
                                                            <span style="margin-right: 10px"
                                                                  class="fonts badge badge-light-danger">غير نشطة</span>
                                                        @endif

                                                    </div>
                                                    <!--end::Name-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                        <a href="#"
                                                           class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
																	<svg width="18" height="18" viewBox="0 0 18 18"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                              fill="currentColor"></path>
																		<path
                                                                            d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                            fill="currentColor"></path>
																		<rect x="7" y="6" width="4" height="4" rx="2"
                                                                              fill="currentColor"></rect>
																	</svg>
																</span>
                                                            <!--end::Svg Icon-->اسم مشرف اللجنة</a>
                                                        <a href="#"
                                                           class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
																	<svg width="24" height="24" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                                              fill="currentColor"></path>
																		<path
                                                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                                            fill="currentColor"></path>
																	</svg>
																</span>
                                                            <!--end::Svg Icon-->مكان اللجنة</a>
                                                        <a href="#" style="margin-right: 15px"
                                                           class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                            <span class="svg-icon svg-icon-4 me-1">
																	<svg width="24" height="24" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                              fill="currentColor"></path>
																		<path
                                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                            fill="currentColor"></path>
																	</svg>
																</span>
                                                            <!--end::Svg Icon-->عنوان بريد اللجنة</a>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Actions-->
                                                <div class="d-flex my-4">
                                                    <!-- <a href="{{route('committees.index')}}" -->
                                                       class="btn btn-sm btn-light me-2"
                                                       id="">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                        <span class="svg-icon svg-icon-3 d-none">
																	<svg width="24" height="24" viewBox="0 0 24 24"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3"
                                                                              d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                                              fill="currentColor"></path>
																		<path
                                                                            d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                                            fill="currentColor"></path>
																	</svg>
																</span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Indicator label-->
                                                        <span class="fonts indicator-label">رجوع</span>
                                                        <!--end::Indicator label-->
                                                        <!--begin::Indicator progress-->
                                                        <span class="indicator-progress">Please wait...
																<span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        <!--end::Indicator progress-->
                                                    </a>
                                                    <!-- <a href="{{route('committees.edit',$committee->committeeID)}}" -->
                                                       class="fonts btn btn-sm btn-primary me-2">تعديل
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
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bold counted">
                                                                    {{$committee->committeeNumber}}
                                                                </div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-semibold fs-6 text-gray-400">رقم اللجنة
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Stat-->
                                                        <!--begin::Stat-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bold counted">
                                                                    {{$committee->committeeDate}}
                                                                </div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-semibold fs-6 text-gray-400">تاريخ اصدار قرار
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
                                            <a class="fonts nav-link text-active-primary ms-0 me-10 py-5"
                                               href="">المعلومات الاساسية</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="fonts nav-link text-active-primary ms-0 me-10 py-5"
                                               href="">الأعضاء</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="fonts nav-link text-active-primary ms-0 me-10 py-5"
                                               href="">المهام</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="fonts nav-link text-active-primary ms-0 me-10 py-5 active"
                                               href="">الضوابط</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="fonts nav-link text-active-primary ms-0 me-10 py-5"
                                               href="">الجلسات</a>
                                        </li>
                                        <!--end::Nav item-->
                                    </ul>
                                    <!--begin::Navs-->
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
                                    <div class="card-title fs-3 fw-bold">تفاصيل الأعضاء</div>
                                    <!--end::Card header-->
                                </div>
                                <div style="padding: 0 50px 50px" class="table-responsive">
                                    <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <!-- <th>رقم العضو</th> -->
                                            <th>اسم العضو</th>
                                            <th> الصفة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr id="deleteMember">
                                            <td>Prof. Yasmin Rolfson II</td>
                                            <td>Beatae sint dolores voluptatem. Quam nihil repellendus illum praesentium
                                                ratione
                                                velit eius.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Miss Electa Watsica</td>
                                            <td>Nisi similique quo illo id. Illo qui eius quis possimus dolorum qui
                                                occaecati.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Dr. Harry Wuckert II</td>
                                            <td>Esse neque impedit rem iusto molestiae magni. Expedita modi amet
                                                consectetur
                                                amet minima possimus.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Hershel Deckow</td>
                                            <td>Et saepe quidem nesciunt quia omnis. Consequuntur aut illum accusamus
                                                velit
                                                consequatur aliquid.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Tabitha Blick</td>
                                            <td>Eos labore et expedita. Et facere molestias autem autem.</td>
                                        </tr>
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
                                    <div class="card-title fs-3 fw-bold">تفاصيل المهام</div>
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
                                        <tr id="deleteMember">
                                            <td>Prof. Yasmin Rolfson II</td>
                                            <td>Beatae sint dolores voluptatem. Quam nihil repellendus illum praesentium
                                                ratione
                                                velit eius.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Miss Electa Watsica</td>
                                            <td>Nisi similique quo illo id. Illo qui eius quis possimus dolorum qui
                                                occaecati.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Dr. Harry Wuckert II</td>
                                            <td>Esse neque impedit rem iusto molestiae magni. Expedita modi amet
                                                consectetur
                                                amet minima possimus.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Hershel Deckow</td>
                                            <td>Et saepe quidem nesciunt quia omnis. Consequuntur aut illum accusamus
                                                velit
                                                consequatur aliquid.
                                            </td>
                                        </tr>
                                        <tr id="deleteMember">
                                            <td>Tabitha Blick</td>
                                            <td>Eos labore et expedita. Et facere molestias autem autem.</td>
                                        </tr>
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
                                    <div class="card-title fs-3 fw-bold">تفاصيل الضوابط</div>
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

                                        <tr id="deleteTask1">
                                            <td>1</td>
                                            <td>Similique voluptas quis reprehenderit. Harum expedita voluptates
                                                natus.
                                            </td>
                                        </tr>

                                        <tr id="deleteTask2">
                                            <td>2</td>
                                            <td>Molestiae sit aut dolorem. Quas mollitia odio fuga recusandae
                                                praesentium
                                                cum.
                                            </td>
                                        </tr>

                                        <tr id="deleteTask3">
                                            <td>3</td>
                                            <td>Vel ut recusandae fugit saepe consequatur. Ratione odit labore
                                                repellendus
                                                magni.
                                            </td>
                                        </tr>

                                        <tr id="deleteTask4">
                                            <td>4</td>
                                            <td>Tempora ducimus maxime magni eos qui. In quia sunt corrupti ullam est.
                                                Aliquam
                                                quos magnam cumque.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Engage widget 10-->
                        </div>

                        <div class="col-lg-6">
                            <!--begin::Tasks-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bold mb-1">المواضيع الحالية</h3>
                                        <div class="fs-6 text-gray-400">اجمالي 25 موضوع بانتظار مناقشتها</div>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">عرض
                                            الكل</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column mb-9 p-9 pt-3">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center position-relative mb-7">
                                        <!--begin::Label-->
                                        <div
                                            class="position-absolute top-0 rounded h-100 bg-secondary w-4px"></div>
                                        <!--end::Label-->
                                        <!--begin::Checkbox-->
                                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                            <label>
                                                <input style="margin-right: 10px" class="form-check-input"
                                                       type="checkbox"
                                                       value="">
                                            </label>
                                        </div>
                                        <!--end::Checkbox-->
                                        <!--begin::Details-->
                                        <div class="fw-semibold">
                                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Create
                                                FureStibe branding logo</a>
                                            <!--begin::Info-->
                                            <div class="text-gray-400">Due in 1 day
                                                <a href="#">Karina Clark</a></div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Menu-->
                                        <button style="margin-right: 10px" type="button"
                                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                            <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                     height="24px" viewBox="0 0 24 24">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="5" y="5" width="5" height="5" rx="1"
                                                                              fill="currentColor"></rect>
																		<rect x="14" y="5" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																		<rect x="5" y="14" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																		<rect x="14" y="14" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																	</g>
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                             data-kt-menu="true" id="kt_menu_62cfa2d252c30">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Menu separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Form-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Status:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <div>
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            data-kt-select2="true" data-placeholder="Select option"
                                                            data-dropdown-parent="#kt_menu_62cfa2d252c30"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-28-3rc0" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-30-jil3"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-29-xtil"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-h0kt-container"
                                                                    aria-controls="select2-h0kt-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-h0kt-container" role="textbox"
                                                                        aria-readonly="true" title="Select option"><span
                                                                            class="select2-selection__placeholder">Select option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Member Type:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <div class="d-flex">
                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox" value="1">
                                                            <span class="form-check-label">Author</span>
                                                        </label>
                                                        <!--end::Options-->
                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                   checked="checked">
                                                            <span class="form-check-label">Customer</span>
                                                        </label>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Notifications:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <div
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               name="notifications" checked="checked">
                                                        <label class="form-check-label">Enabled</label>
                                                    </div>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-menu-dismiss="true">Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-menu-dismiss="true">Apply
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Menu-->
                                    </div>
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
                                        <div class="fs-6 fw-semibold text-gray-400">24 موضوع مؤجل</div>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!-- <a href="{{route('session.topics')}}" class="btn btn-light btn-sm">عرض
                                            المواضيع</a> -->
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
                                            <div
                                                class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                                <span class="fs-2qx fw-bold">237</span>
                                                <span class="fs-6 fw-semibold text-gray-400">اجمالي المواضيع</span>
                                            </div>
                                            <canvas id="project_overview_chart" width="175" height="175"
                                                    style="display: block; box-sizing: border-box; height: 175px; width: 175px;"></canvas>
                                        </div>
                                        <!--end::Chart-->
                                        <!--begin::Labels-->
                                        <div
                                            class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                            <!--begin::Label-->
                                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                <div class="bullet bg-primary me-3"></div>
                                                <div class="sumTaskStatus text-gray-400">نشطة</div>
                                                <div id="topicActive"
                                                     class="sumTaskNums ms-auto fw-bold text-gray-700"></div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                <div class="bullet bg-success me-3"></div>
                                                <div class="sumTaskStatus text-gray-400">مكتملة
                                                </div>
                                                <div id="topicCompleted"
                                                     class="sumTaskNums ms-auto fw-bold text-gray-700"></div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                <div class="bullet bg-danger me-3"></div>
                                                <div class="sumTaskStatus text-gray-400">متأخرة</div>
                                                <div id="topicLater"
                                                     class="sumTaskNums ms-auto fw-bold text-gray-700"></div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                                <div style="color: gray" class="bullet bg-gray-300 me-3"></div>
                                                <div class="sumTaskStatus text-gray-400">لم يتم مناقشتها</div>
                                                <div id="noYet" class="sumTaskNums ms-auto fw-bold text-gray-700"></div>
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

                        <div class="col-lg-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bold mb-1">الجلسات القادمة</h3>
                                        <div class="fs-6 text-gray-400">اجمالي 40 جلسة قادمة</div>
                                        <br>
                                        <!-- <a href="{{route('sessions.create',$committee->committeeID)}}" -->
                                           class="btn btn-sm btn-primary me-3">انشاء
                                            جلسة</a><br>
                                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                           data-bs-target="#kt_modal_new_target">المخطط الزمني للجلسات</a>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Day-->
                                        <div id="kt_schedule_day_0" class="tab-pane fade show" role="tabpanel">
                                            <!--begin::Time-->
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <!--begin::Bar-->
                                                <div
                                                    class="position-absolute h-100 w-5px bg-secondary rounded top-0"></div>
                                                <!--end::Bar-->
                                                <!--begin::Info-->
                                                <div style="margin-right: 20px" class="fw-semibold ms-5 text-gray-600">
                                                    <!--begin::Time-->
                                                    <div class="fs-5">14:30 - 15:30
                                                        <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <!--end::Time-->
                                                    <!--begin::Title-->
                                                    <a href="#"
                                                       class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">الجلسة
                                                        الأولى</a>
                                                    <!--end::Title-->
                                                    <!--begin::User-->
                                                    <div class="text-gray-400">يرئسها
                                                        <a href="#">{{$committee->committeeName}}</a></div>
                                                    <!--end::User-->
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Action-->
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Time--> <!--begin::Time-->
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <!--begin::Bar-->
                                                <div
                                                    class="position-absolute h-100 w-5px bg-secondary rounded top-0"></div>
                                                <!--end::Bar-->
                                                <!--begin::Info-->
                                                <div style="margin-right: 20px" class="fw-semibold ms-5 text-gray-600">
                                                    <!--begin::Time-->
                                                    <div class="fs-5">14:30 - 15:30
                                                        <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <!--end::Time-->
                                                    <!--begin::Title-->
                                                    <a href="#"
                                                       class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">الجلسة
                                                        الثانية</a>
                                                    <!--end::Title-->
                                                    <!--begin::User-->
                                                    <div class="text-gray-400">يرئسها
                                                        <a href="#">{{$committee->committeeName}}</a></div>
                                                    <!--end::User-->
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Action-->
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Time--> <!--begin::Time-->
                                            <div class="d-flex flex-stack position-relative mt-8">
                                                <!--begin::Bar-->
                                                <div
                                                    class="position-absolute h-100 w-5px bg-secondary rounded top-0"></div>
                                                <!--end::Bar-->
                                                <!--begin::Info-->
                                                <div style="margin-right: 20px" class="fw-semibold ms-5 text-gray-600">
                                                    <!--begin::Time-->
                                                    <div class="fs-5">14:30 - 15:30
                                                        <span class="fs-7 text-gray-400 text-uppercase">pm</span></div>
                                                    <!--end::Time-->
                                                    <!--begin::Title-->
                                                    <a href="#"
                                                       class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">الجلسة
                                                        الثالثة</a>
                                                    <!--end::Title-->
                                                    <!--begin::User-->
                                                    <div class="text-gray-400">يرئسها
                                                        <a href="#">{{$committee->committeeName}}</a></div>
                                                    <!--end::User-->
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Action-->
                                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Time-->
                                        </div>
                                        <!--end::Day-->
                                    </div>
                                    <!--end::Card toolbar-->
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
        // init chart
        let element = document.getElementById("project_overview_chart");

        $('#topicActive').html(30);
        $('#topicCompleted').html(45);
        $('#topicLater').html(10);
        $('#noYet').html(25);

        let config = {
            type: 'doughnut', data: {
                datasets: [{
                    data: [30, 45, 10, 25], backgroundColor: ['#009ef7', '#50cd89', '#f1416c', 'gray']
                }], labels: ['Active', 'Completed', 'failed', 'Yet to start']
            }, options: {
                chart: {
                    fontFamily: 'inherit'
                }, cutoutPercentage: 75, responsive: true, maintainAspectRatio: false, cutout: '75%', title: {
                    display: false
                }, animation: {
                    animateScale: true, animateRotate: true
                }, tooltips: {
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
                }, plugins: {
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
