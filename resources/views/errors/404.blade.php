<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Page bg image-->
        <style>
        body { background-image: url('assets/media/auth/bg7.jpg');}[data-theme="dark"] body {background-image: url('assets/media/auth/bg7-dark.jpg');}
        </style>
        <!--end::Page bg image-->
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Oops!</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="fw-bolder fs-2hx text-gray-800 mb-4">هذه الصفحة غير موجودة!</div>
                    <!--end::Text-->
                    <!--begin::Illustration-->
                    <div class="mb-3">
                        <img src="{{asset('assets/media/auth/404-error.png')}}" class="mw-100 mh-300px theme-light-show"
                            alt="">
                        <img src="{{asset('assets/media/auth/404-error-dark.png')}}"
                            class="mw-100 mh-300px theme-dark-show" alt="">
                    </div>
                    <!--end::Illustration--> 
                    <!--begin::Link-->
                    <div class="mb-0">
                        <a href="{{route('mainhome')}}" class="btn btn-sm btn-primary">عودة للصفحة الرئيسية</a>
                        <a href="{{ url()->previous()}}" class="btn btn-sm btn-primary">عودة للصفحة السابقة</a>
                    </div>
                    <!--end::Link-->
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>

</body>

</html>