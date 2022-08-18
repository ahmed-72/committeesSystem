<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>

</head>

<body dir="rtl">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="navbar-brand">
            <img src="https://palsawa.com/uploads/images/2y3r0.jpg" width="40" height="40"
                class="d-inline-block align-top" alt="">
        </div>

        <h5 class="my-0 mr-md-auto font-weight-normal">وزارة الأوقاف و الشؤون الدينية</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#"></a>
        </nav>
    </div>

    @if($errors->any())
    <ul class="alert alert-danger col-6">
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
    @endif
    
    @if(session()->has('session'))
    <h5 class="col-9 alert alert-danger">{{session('session')}}</h5>
    
    @endif

    <div class="form-group" dir="rtl">
        <form action="{{route('addDiscussionTopics.store')}}" id="form" method="POST">
            @csrf
            <div class="col-7 mr-auto  ml-3 mt-3">
                <h4>أضف موضوعاً لمناقشته في الجلسة القادمة</h4>
                <hr>
                <div class="mt-3">
                    <label for="committeeID">رقم اللجنة</label>
                    <input class="form-control" type="text" name="committeeID" id="{{$committee->committeeID}}" readonly value="{{$committee->committeeID}}">
                    <input class="form-control" type="text" name="committeeName" id="{{$committee->committeeName}}" readonly value="{{$committee->committeeName}}">
                </div>

                <!-- begin topics -->
                <div class="repeater mt-2" >
                    <hr>

                    <div data-repeater-list="TopicsGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="cat-id" />
                                <div class="col-auto">
                                    <label for="TopicDescription">البند</label>
                                </div>
                                <div class="col-auto ">
                                    <input class="form-control" type="text" name="TopicDescription"
                                        id="TopicDescription">
                                </div>
                                <div class="col-auto">
                                    <label for="ResolutionDescription">مشروع القرار المقترح</label>
                                </div>
                                <div class="col-auto ">
                                    <input class="form-control" type="text" name="ResolutionDescription"
                                        id="ResolutionDescription">
                                </div>
                                <div class="col-auto ">
                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-info" value="Add" />
                </div>
                <!-- end Topics -->
                
                <div class="col-5">
                    <hr>
                    <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="إضافة">
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>
@include('includes.myscripts')

<!-- begin repeater -->
<script>
$(document).ready(function() {
    'use strict';
    window.id = 1;

    $('.repeater').repeater({
        defaultValues: {
            'id': window.id,

        },
        show: function() {
            $(this).slideDown();
            console.log($(this).find('input')[1]);
            $('#cat-id').val(window.id);         
        },
        hide: function(deleteElement) {
            if (confirm('هل أنت متأكد من أنك تريد حذف هذا العنصر؟')) {
                window.id--;
                $('#cat-id').val(window.id);
                $(this).slideUp(deleteElement);
                console.log($('.repeater').repeaterVal());
            }
        },
        ready: function(setIndexes) {
        }
    });
});
</script>
</html>