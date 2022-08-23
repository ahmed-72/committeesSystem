   
<!--begin::notifications -->
<div class="app-navbar-item ms-2 ms-lg-3">
    <!--begin::Menu toggle-->
    <a href="#"
        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
        data-kt-menu-trigger="{default:'click', lg:'hover' }" data-kt-menu-attach="parent"
        data-kt-menu-placement="bottom-end">

        @if($unredCount >0)
        <span class="badge badge-light-danger badge-circle fw-bold fs-7">{{$unredCount}} </span>
        @endif

        <!--begin::Svg Icon | path: icons/duotune/general/gen060.svg-->
        <span class="svg-icon svg-icon-primary svg-icon-2x">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Notifications1.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path
                        d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                        fill="@if($unredCount <=0)#000000 @else #ff0000 @endif" />
                    <rect fill="@if($unredCount <=0)#000000 @else #ff0000 @endif" opacity="0.3" x="10" y="16" width="4"
                        height="4" rx="2" />
                </g>
            </svg>
            <!--end::Svg Icon-->

        </span>
        <!--end::Svg Icon-->
        <!--begin::Svg Icon | path: icons/duotune/general/gen061.svg-->
        <span class="svg-icon theme-dark-show svg-icon-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.0647 5.43757C19.3421 5.43757 19.567 5.21271 19.567 4.93534C19.567 4.65796 19.3421 4.43311 19.0647 4.43311C18.7874 4.43311 18.5625 4.65796 18.5625 4.93534C18.5625 5.21271 18.7874 5.43757 19.0647 5.43757Z"
                    fill="currentColor"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
    <!--begin::Menu toggle-->
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-300px"
        data-kt-menu="true" data-kt-element="theme-mode-menu">
        <p> لديك {{$unredCount}} تنبيهات غير مقروؤة </p>
        @php $count=0 @endphp
        <ul>
            @foreach($notifications as $notification)
            @if($count < 3) <div class="menu-item px-3 my-0">
                <a href="{{route('notification.show'  ,['notificationID'=>$notification->id])}}"
                    class="menu-link px-3 py-2">

                    <li> {{$notification->data['titel']}}
                   <br>
                    <span class="mx-4">{{$notification->data['body']}}</span></li>

    </div>
    @php $count++ @endphp
    @endif
    @endforeach
    </ul>
    <a href="{{route('notifications')}}">عرض الكل</a>
</div>
<!--end::Menu-->
</div>
<!--end::notifications-->