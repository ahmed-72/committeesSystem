@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Users')

@section('main_path','Users')
@section('sub_path','Add User')



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
@if(session()->has('AddStatus'))
    @if(session('AddStatus'))
    <div class="mb-2 alert alert-success">user added successfully 
    <img src="https://www.svgrepo.com/show/13650/success.svg" alt="Icon Success"style="width: 20px;height: 20px;">
    </div>
    @endif
    @endif

    @if($errors->any())
    <ul class="mb-2 alert alert-danger">
        @foreach ($errors->all() as $message)
        <li>{{$message}}</li>

        @endforeach
    </ul>
    @endif
    <form class="form" enctype="multipart/form-data" action="{{route('addUser.store')}}" method="post">
        @csrf
        <input class="form-control bg-transparent px-15" type="text" placeholder="Name" name="name" id="name"><br>
        <input class="form-control bg-transparent px-15" type="email" placeholder="Email" name="email"><br>
        <input class="form-control bg-transparent px-15" type="password" placeholder="Password" name="password"><br>
        <input class="form-control bg-transparent px-15" type="password" placeholder="confirm Password" name="password_confirmation"><br>
        <select class="form-control bg-transparent px-15" name="employeeID" id="employeeID">
        <option value="" disabled selected hidden>select an employee as(employee Id -- employee Name)</option>
            @foreach($employees as $employee)
            <option value="{{$employee->employeeID}}">{{$employee->employeeID}}--{{$employee->employeeName}}</option>
            @endforeach
        </select>
        <input class="form-control bg-transparent px-15" type="file" name="image" id="image"><br> 
        <label>select a role</label>
    <select class="form-control bg-transparent px-15" name="role_id">
        <option value=""></option>
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
 @endforeach
 </select>
        <input type="submit" class="btn btn-sm fw-bold btn-primary " id="submit" value="Add">
    </form>
</div>
@endsection

@section('scripts')
@endsection