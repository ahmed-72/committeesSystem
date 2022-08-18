@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Demo')
@section('main_path','Demo')
@section('sub_path','Demo')

@section('styles')
@endsection

@section('content')
<div class="card">
<button style="width:100px ;" class="btn btn-bg-info"><a href="{{route('roleUser.create')}}">add role user</a></button>
<table>
        <thead>
            <tr>
                <th>userName</th>
                <th>RoleName</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roleUsers as $roleUser)
            <tr>
                <td>{{$roleUser->user->name}}</td>
                <td>{{$roleUser->role->name}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

@endsection

@section('scripts')
@endsection