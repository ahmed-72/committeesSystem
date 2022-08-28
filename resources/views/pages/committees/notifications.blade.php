@extends('pages.parent')

@section('title','الإشعارات')

@section('page_name','الإشعارات')

@section('main_path','المستخدمين')
@section('sub_path','إشعارات المستخدم')



@section('styles')
@endsection

@section('content')
<div class="px-6">
@foreach($notifications as $notification)
<div class="card col-6 <?php if($notification->unread()) echo" bg-opacity-15 bg-primary" ?>">
<ul class="">
<li>{{$notification->data['titel']}} </li>
<li>{{$notification->data['body']}} </li>
<li>{{$notification->created_at->diffForHumans()}}</li>
<button> <a href="{{route('markNotificationAsRead'  ,['notificationID'=>$notification->id])}}"> علم كمقروء</a></button>
 <button> <a href="{{route('notification.show'  ,['notificationID'=>$notification->id])}}"> عرض القرار </a></button> 
<!-- <button> <a href="/notification?notificationID={{$notification->id}}"> عرض القرار </a></button> -->
</ul>
</div>
<br>
@endforeach
</div>
@endsection

@section('scripts')
@endsection