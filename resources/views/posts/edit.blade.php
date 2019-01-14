@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::model($post, ['method'=>'PATCH','action'=>['PostsController@update', $post->id]] ) !!}

        {!! Form::label('title', 'SomeTitle:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}


        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}
    <br>
    {!! Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]]) !!}


        {!! Form::submit('Delete Post', ['class'=>'bg-danger']) !!}

    {!! Form::close() !!}



    @endsection