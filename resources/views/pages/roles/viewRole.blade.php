@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')



@section('styles')
@endsection

@section('content')
<div><a href="{{route('roles.create')}}" class="btn btn-info btn-hover-rotate-end">اضافة جديدة</a>
 <hr>
<div>
@foreach($roles as $role) 
{{$role->name}} <div><a href="{{route('roles.edit',$role->id)}}" class="btn btn-success btn-hover-rotate-end">تعديل</a>
 <div><form action="{{route('roles.destroy',$role->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger btn-hover-rotate-start" value="حذف">
 </form>

</div> <ul>
@foreach($role->abilities as $abilitie)

    <li>
        {{$abilitie}}
    </li>

@endforeach </ul>
@endforeach
</div>
@endsection

@section('scripts')
@endsection