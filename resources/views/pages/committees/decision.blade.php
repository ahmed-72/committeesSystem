@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')



@section('styles')
@endsection

@section('content')

<li>{{$notification->data['titel']}} </li>
<li>{{$notification->data['body']}} </li>

@endsection

@section('scripts')
@endsection