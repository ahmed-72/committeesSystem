@extends('pages.parent')


@section('page_name','اضافة مواضيع للنقاش')
@section('main_path','اللجان')
@section('sub_path','اضافة مواضيع للنقاش')

@section('styles')

@endsection

@section('content')


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
    <div class="card card-flush h-md-100 col-9 px-4 fs-4">

        <form action="{{route('addDiscussionTopics.store')}}" id="form" method="POST">
            @csrf
            <div class="col-7 mr-auto  ml-3 mt-3">
                <h4>أضف موضوعاً لمناقشته في الجلسة القادمة</h4>
                <hr>
                <div class="mt-3">
                    <label for="committeeID">اسم و رقم اللجنة</label>
                    <input class="form-control" type="text" name="committeeID" id="{{$committee->committeeID}}" readonly
                        value="{{$committee->committeeID}}">
                        <input class="form-control" type="text" name="committeNanme" id="{{$committee->committeeID}}" readonly
                        value="{{$committee->committeeName}}">
                </div>

                <!-- begin topics -->
                <div class="repeater mt-2">
                    <hr>

                    <div data-repeater-list="TopicsGroup">
                        <div data-repeater-item>
                            <div class="form-row mt-2">
                                <input type="hidden" name="id" id="cat-id" />
                                <div class="col-auto">
                                    <label for="TopicDescription">البند</label>
                                </div>
                                <div class="col-auto ">
                                    <input class="form-control" type="text" name="TopicDescription" required
                                        id="TopicDescription">
                                </div>
                                <div class="col-auto fs-4">
                                    <label for="ResolutionDescription">مشروع القرار المقترح</label>
                                </div>
                                <div class="col-auto ">
                                    <input class="form-control" type="text" name="ResolutionDescription" required
                                        id="ResolutionDescription">
                                </div>
                                <div class="col-sm-auto ">
                                    <button data-repeater-delete type="button"
                                        class="btn btn-outline-danger border border-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                            </path>
                                        </svg>
                                        حذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" class="btn btn-info" value="أضافة موضوع آخر" />
                </div>
                <!-- end Topics -->

                <div class="col-5">
                    <hr>
                    <input type="submit" class="btn btn-primary mb-2 ml-5 pl-5 pr-5" value="حفظ">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')


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
        ready: function(setIndexes) {}
    });
});
</script>
@endsection