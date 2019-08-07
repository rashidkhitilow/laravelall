@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img height="180" src="{{$user->photo? $user->photo->file:'http://placehold.it/200x200'}}" alt="" class="img-resonsive img-rounded" />
    </div>
    <div class="col-sm-9 clearfix">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id',[''=>'Choose Role'] + $roles, null, ['class'=>'form-control']) !!}
            </div> 
            
            <div class="form-group">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active',array('1'=>'Activate','0'=>'Deactivate'), null, ['class'=>'form-control']) !!}
            </div> 

            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>  

            <div class="form-group">
                {!! Form::submit('Create User', ['class'=>'btn btn-primary pull-left']) !!}
            </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'Delete','action'=>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    @include('includes.form_errors')
</div>

@endsection
