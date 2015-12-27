@extends('master')
    <div class="container">
@section('content')

        <div class="card card2 card-container">
    {!! Form::open(array('url' => 'register')) !!}
    <h1 class="titel">Register</h1>
    <div class="form-group">
        <!--{!! Form::label('name', 'Name') !!}-->
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name')) !!}
    </div>
    <div class="form-group">
        <!--{!! Form::label('email', 'Email Address') !!}-->
        {!! Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) !!}
    </div>
    <div class="form-group">
        <!--{!! Form::label('code', 'Secret Code') !!}-->
        {!! Form::text('code', Input::old('code'), array('class' => 'form-control', 'placeholder' => 'Secret code')) !!}
    </div>
    <div class="form-group">
        <!--{!! Form::label('password', 'Password') !!}-->
        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
    </div>
    <div class="form-group">
        <!--{!! Form::label('password_confirmation', 'Password confirmation') !!}-->
        {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password Confirmation')) !!}
    </div>

    <p>{!! Form::submit('Submit', array('class' => 'class="btn btn-lg btn-primary btn-block btn-signin"')) !!}</p>
    {!! Form::close() !!}
    </div>
</div>
@endsection