@extends('master')

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

 {!!   Form::open(array('url' => 'content/add')) !!}

    <p>
        {!! Form::label('url', 'Website url') !!}
        {!! Form::text('url', Input::old('url'), array('placeholder' => 'url.com')) !!}
    </p>


    <p>{!! Form::submit('Submit') !!}</p>
    {!! Form::close() !!}
@endsection