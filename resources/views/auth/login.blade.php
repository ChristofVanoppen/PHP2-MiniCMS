@extends('master')
<div class="container">
@section('content')
    
        <div class="card card-container">
 {!!   Form::open(array('url' => 'login')) !!}
    <h1 class="titel">Login</h1>

    <!-- if there are login errors, show them here -->
    <p>
        {!! $errors->first('email') !!}
        {!! $errors->first('password') !!}
    </p>

    <p>
         <!--{!! Form::label('email', 'Email Address') !!}-->
        {!! Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) !!}
    </p>

    <p>
         <!--{!! Form::label('password', 'Password') !!}-->
        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
    </p>

    <p>
            <a href="/register">Nog geen account? Klik hier!</a>
    </p>

    <p>{!! Form::submit('Sign in', array('class' => 'class="btn btn-lg btn-primary btn-block btn-signin"')) !!}</p>
    {!! Form::close() !!}
    </div>
</div>
@endsection