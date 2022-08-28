@extends('pages.parent')

@section('page_name','الأعضاء')

@section('main_path','الأعضاء')
@section('sub_path','تعديل بيانات عضو')


@section('styles')
<style>
.form {
    margin-left: 5%;
}

#submit {
    width: 20%;
}
</style>
@endsection

@section('content')
<div class="card-body pt-9 pb-0">
    @if($errors->any())
    <ul class="mb-2 alert alert-danger">
        @foreach ($errors->all() as $message)
        <li>{{$message}}</li>

        @endforeach
    </ul>
    @endif
    <form class="form" action="{{URL('updateUser').'/'.$user->id}}" method="post">
        @csrf
        @method('put')
        <input class="form-control bg-transparent px-15" type="text" value="{{$user->name}}" name="name" id="name"><br>
        <input class="form-control bg-transparent px-15" type="email" value="{{$user->email}}" name="email"><br>
        <input class="form-control bg-transparent px-15" type="file"  name="image"id="image"><br>
        <input type="submit" class="btn btn-sm fw-bold btn-primary " placeholder="image url" id="submit" value="update">
    </form>
</div>
@endsection

@section('scripts')
@endsection