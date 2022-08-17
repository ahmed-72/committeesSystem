@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')



@section('styles')
@endsection

@section('content')
<div class="card">
<h4>{{$user->id}}</h4>
<h4>{{$user->name}}</h4>
<h4>{{$user->email}}</h4>
<h4>{{$user->employeeID}}</h4>
</div>
@endsection

@section('scripts')
@endsection