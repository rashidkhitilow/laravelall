@extends('layouts.admin')

@section('content')
<h1>Media</h1>

<div class="col-sm-12">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created Time</th>
            </tr>
        </thead>
        <tbody>
            @if($photos)
            @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img height="100" width="200px"  src="{{($photo->file)? $photo->file : 'http://placehold.it/100x100'}}" alt="" /> </td>
                <td>{{$photo->created_at? $photo->created_at->diffForHumans():''}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@stop