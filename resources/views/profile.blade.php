@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <br>
                    <br> 
                    <br>
                    <br>
                    <br> 
                    <br>  
                    <h1>Create Post</h1>
                    <br>
                    <br> 
                    <br>

                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::label('title', 'Title')}}
                        {{ Form::text('title', '')}}
                        {{ Form::label('text', 'Text')}}
                        {{ Form::text('text', '')}}
                        {{ Form::label('media', 'Upload a Picture or Video')}}
                        {{ Form::file('media')}}
                        {{ Form::submit('Submit')}}
                    {!! Form::close() !!}
                    <br>
                    <br> 
                    <br>
                    <h1>Create Challange</h1>
                    <br>
                    <br> 
                    <br>
                    {!! Form::open(['action' => 'ChallangesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::label('title', 'Title')}}
                        {{ Form::text('title', '')}}
                        {{ Form::label('text', 'Text')}}
                        {{ Form::text('text', '')}}
                        {{ Form::submit('Submit')}}
                    {!! Form::close() !!}
                    <br>
                    <br> 
                    <br>
                    <br>
                    <br> 
                    <br>

                    <img src="/storage/userPics/{{ $user->userPic }}" height:="auto" width="300px"/>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
