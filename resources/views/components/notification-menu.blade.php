<!--begin::notifications -->
<div class="app-navbar-item ms-1 ms-lg-3">
    <!--begin::Menu toggle-->
    <a href="#"
        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
        data-kt-menu-trigger="{default:'click', lg:'hover' }" data-kt-menu-attach="parent"
        data-kt-menu-placement="bottom-end">
        <!--begin::Svg Icon | path: icons/duotune/general/gen060.svg-->
        <span class="svg-icon theme-light-show svg-icon-2">
        <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g class="style-scope yt-icon"><path d="M10,20h4c0,1.1-0.9,2-2,2S10,21.1,10,20z M20,17.35V19H4v-1.65l2-1.88v-5.15c0-2.92,1.56-5.22,4-5.98V3.96 c0-1.42,1.49-2.5,2.99-1.76C13.64,2.52,14,3.23,14,3.96l0,0.39c2.44,0.75,4,3.06,4,5.98v5.15L20,17.35z M19,17.77l-2-1.88v-5.47 c0-2.47-1.19-4.36-3.13-5.1c-1.26-0.53-2.64-0.5-3.84,0.03C8.15,6.11,7,7.99,7,10.42v5.47l-2,1.88V18h14V17.77z" class="style-scope yt-icon"></path></g></svg>
            <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.9905 5.62598C10.7293 5.62574 9.49646 5.9995 8.44775 6.69997C7.39903 7.40045 6.58159 8.39619 6.09881 9.56126C5.61603 10.7263 5.48958 12.0084 5.73547 13.2453C5.98135 14.4823 6.58852 15.6185 7.48019 16.5104C8.37186 17.4022 9.50798 18.0096 10.7449 18.2557C11.9818 18.5019 13.2639 18.3757 14.429 17.8931C15.5942 17.4106 16.5901 16.5933 17.2908 15.5448C17.9915 14.4962 18.3655 13.2634 18.3655 12.0023C18.3637 10.3119 17.6916 8.69129 16.4964 7.49593C15.3013 6.30056 13.6808 5.62806 11.9905 5.62598Z"
                    fill="currentColor"></path>
            </svg> -->
            @if($unredCount >0)
            <p style="color:red">{{$unredCount}}</p>
            @endif
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
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-175px"
        data-kt-menu="true" data-kt-element="theme-mode-menu">
        <p> لديك {{$unredCount}} تنبيهات غير مقروؤة </p>

        @foreach($notifications as $notification)
        <div class="menu-item px-3 my-0">
            <a href="{{route('notification.show'  ,['notificationID'=>$notification->id])}}" class="menu-link px-3 py-2">
                <ul>
                    {{$notification->data['titel']}}</li>
                    <li>
                        <ul>
                            <li>{{$notification->data['body']}}</li>
                        </ul>
                   
                </ul>
            </a>
        </div>

        @endforeach
        <a href="{{route('notifications')}}">عرض الكل</a>
    </div>
    <!--end::Menu-->
</div>
<!--end::notifications-->

