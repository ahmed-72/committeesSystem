@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')



@section('styles')
@endsection

@section('content')
<div class="card-body  pt-9 pb-0 bg-gray-200" dir="rtl">
    <form class="form" action="{{route('roles.store')}}" method="post">
        @csrf
        <input class="form-control bg-transparent px-15" type="text" placeholder="Name" name="name"><br>
        <div class="px-10">

        <label class="required  form-label">اختر الصلاحيات</label><br>
        @php $count=0 @endphp
        @foreach(config('abilities') as $key=>$value)
        <div class="form-check form-check-custom  form-check-success  pl-5">
        <input class="form-check-input" type="checkbox" value="{{$key}}" name="abilities[]" />
        <label class="form-check-label ">
                {{$value}}
            </label>
        </div>
        @php $count++ @endphp
        @if($count %4==0) <br> @endif
        @endforeach <br>
        </div>
        <input type="submit" class="btn btn-primary btn-hover-scale me-5 " id="submit" value="save">
    </form>
</div>
@endsection

@section('scripts')
@endsection