@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')

@section('main_path','Demo')
@section('sub_path','Demo')



@section('styles')
@endsection

@section('content')

@foreach($notifications as $notification)

<ul class="<?php if($notification->unread()) echo" bg-opacity-15 bg-primary" ?>">
<li>{{$notification->data['titel']}} </li>
<li>{{$notification->data['body']}} </li>
<li>{{$notification->created_at->diffForHumans()}}</li>
<button> <a href="{{route('markNotificationAsRead'  ,['notificationID'=>$notification->id])}}"> علم كمقروء</a></button>
 <button> <a href="{{route('notification.show'  ,['notificationID'=>$notification->id])}}"> عرض القرار </a></button> 
<!-- <button> <a href="/notification?notificationID={{$notification->id}}"> عرض القرار </a></button> -->

</ul>
@endforeach

@endsection

@section('scripts')
@endsection