@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')
@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
@endsection

@section('content')
<form action="{{route('roleUser.store')}}" method="post">
@csrf
    <label>select a role</label>
    <select name="role_id">
        <option value=""></option>
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
 @endforeach
 </select>
<br>
<label>select a user</label>
 <select name="user_id">
        <option value=""></option>
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
 @endforeach
    </select>
<input type="submit" value="save">
</form>

@endsection

@section('scripts')
@endsection