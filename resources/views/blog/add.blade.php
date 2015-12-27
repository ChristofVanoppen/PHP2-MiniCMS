@extends('master')
    <div class="container">
@section('content')
  @if(Session::has('message'))
        <div class="alert alert-success">
             <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
             <p>{{ Session::get('error') }}</p>
        </div>
    @endif

        <div class="card card-container">
 {!!   Form::open(array('url' => 'content/add')) !!}
     <h1 class="titel">Add URL</h1>

    <p>
        <!--{!! Form::label('url', 'Website url') !!}-->
        {!! Form::text('url', Input::old('url'), array('class' => 'form-control', 'placeholder' => 'https://www.name.com')) !!}
    </p>


    <p>{!! Form::submit('Submit', array('class' => 'class="btn btn-lg btn-primary btn-block btn-signin"')) !!}</p>
    {!! Form::close() !!}
        </div>
</div>
@endsection