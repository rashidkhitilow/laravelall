@extends('layouts.admin')

@section('content')
<h1>Posts</h1>


<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category</th>
        <th scope="col">Photo</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Comments</th>
        <th scope="col">User</th>
        <th scope="col">Created Time</th>
      </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
        <tr>
            <th scope="row"><a href="{{route('home.post',$post->slug)}}">{{$post->id}}</a></th>
            <td>{{$post->category? $post->category->name : 'Uncategorized'}}</td>
            <td><img height="60"  src="{{($post->photo)? $post->photo->file: 'http://placehold.it/100x100'}}" alt="" /> </td>
            <td>{{$post->title}}</td>
            <td>{!!$post->body!!}</td>
            <th><a href="{{route('comments.show',$post->id)}}">View Comments</a></th>
            <td><a href="{{route('posts.edit',$post->id)}}">Edit Post</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$posts->render()}}
    </div>
  </div>
@stop