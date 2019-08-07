@extends('layouts.admin')





@section('content')
@if(Session::has('deleted_user'))
    <p class="bg bg-danger">{{session('deleted_user')}}</p>
@endif

<h1>Users</h1>
<table class="table table-striped table-bordered  table-responsive table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name & Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created Time</th>
            <th scope="col">Updated Time</th>
        </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="60"  src="{{($user->photo)? $user->photo->file: 'http://placehold.it/100x100'}}" alt="" /> </td>
            <td><a href="{{route('users.edit',$user->id)}}" >{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active':'Deactive'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@stop
