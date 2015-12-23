@extends('master')

@section('content')
  @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            <p>{{ Session::get('error') }}</p>
        </div>
    @endif

@foreach($media as $medium)

        @if($medium->type === 'youtube')
            <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$medium->mediaId}}" frameborder="0" allowfullscreen></iframe>
        @elseif($medium->type === 'vimeo')
            <iframe src="//player.vimeo.com/video/{{$medium->mediaId}}" width="420" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        @elseif($medium->type === 'soundcloud')
            <iframe class="iframe" width="420" height="315" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{$medium->url}}&amp;auto_play=false&amp;buying=true&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=true&amp;show_user=true&amp;hide_related=false&amp;visual=true&amp;start_track=0&amp;callback=true"></iframe>
        @endif

    @endforeach
@endsection