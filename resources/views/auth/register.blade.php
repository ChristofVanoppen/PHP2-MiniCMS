@extends('master')

@section('content')
    {!! Form::open(array('url' => 'register')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email Address') !!}
        {!! Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('code', 'Secret Code') !!}
        {!! Form::text('code', Input::old('code'), array('class' => 'form-control', 'placeholder' => 'code')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password confirmation') !!}
        {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password Confirmation')) !!}
    </div>

    <div class="form-group button__margin">
        <button class="btn btn-primary" type="submit">Register</button>
    </div>
    {!! Form::close() !!}
@endsection