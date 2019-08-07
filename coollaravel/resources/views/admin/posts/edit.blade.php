@extends('layouts.admin')
@include('includes.tinyeditor')
@section('content')
<h1>Edit Post</h1>
<div class="row">
    <div class="col-sm-3">
        <img height="120" width="230" src="{{$post->photo? $post->photo->file:'http://placehold.it/200x200'}}" alt="" class="img-resonsive img-rounded" />
    </div>
    <div class="col-sm-9 clearfix">
        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('body','Content:') !!}
                {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-2']) !!}
            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'Delete','action'=>['AdminPostsController@destroy',$post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger pull-right col-sm-2']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    @include('includes.form_errors')
</div>
@stop