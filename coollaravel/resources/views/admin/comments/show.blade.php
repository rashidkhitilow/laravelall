@extends('layouts.admin')

@section('content')

@if(count($comments)>0)
<h1>Comments</h1>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">Email</th>
        <th scope="col">Photo</th>
        <th scope="col">Message</th>
        <th scope="col">Post Id</th>
        <th scope="col">Created Time</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td><img height="60"  src="{{($comment->photo)? $comment->photo: 'http://placehold.it/100x100'}}" alt="" /> </td>
            <td>{{str_limit($comment->body,100)}}</td>
            <td><a href="{{route('home.post',$comment->post_id)}}">View Post</a></td>
            <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>
              @if($comment->is_active==1)
                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                  <input type="hidden" name="is_active" value="0">
                  <div class="form-group">
                      {!! Form::submit('Decline', ['class'=>'btn btn-info']) !!}
                  </div>
                {!! Form::close() !!}
              @else
              {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                <input type="hidden" name="is_active" value="1">
                <div class="form-group">
                    {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
              @endif
            </td>
            <td>
              {!! Form::open(['method'=>'Delete','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@else
  <h1 class="text-center">No Comments</h1>
@endif
@stop