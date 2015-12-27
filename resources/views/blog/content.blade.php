@extends('master')

@section('content')
    
        <div class="card card3 card-container">
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
            <div class="blogPost">
            <?php
                $data = json_decode(file_get_contents("http://www.youtube.com/oembed?url=".$medium->url."&format=json"));
                echo "<h3>".$data->title." By ".$data->author_name."</h3>";
            ?>
            <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$medium->mediaId}}" frameborder="0" allowfullscreen></iframe>
            </div>
        @elseif($medium->type === 'vimeo')
            <div class="blogPost">
            <?php
                $data = json_decode(file_get_contents("http://vimeo.com/api/v2/video/".$medium->mediaId.".json"));
                echo "<h3>".$data[0]->title." By ".$data[0]->user_name."</h3>";
            ?>
            <iframe src="//player.vimeo.com/video/{{$medium->mediaId}}" width="420" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
             </div>
        @elseif($medium->type === 'soundcloud')
            <div class="blogPost">
            <?php
                $data = json_decode(file_get_contents("https://soundcloud.com/oembed?url=".$medium->url."&format=json"));
                echo "<h3>".$data->title." By ".$data->author_name."</h3>";
            ?>
            <iframe class="iframe" width="420" height="315" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{$medium->url}}&amp;auto_play=false&amp;buying=true&amp;liking=true&amp;download=true&amp;sharing=true&amp;show_artwork=true&amp;show_comments=true&amp;show_playcount=true&amp;show_user=true&amp;hide_related=false&amp;visual=true&amp;start_track=0&amp;callback=true"></iframe>
             </div>
       @elseif($medium->type === 'other')
            <div class="blogPost">
            <?php
                $url = $medium->url;
                $html = file_get_contents($url);
                $dom = new domDocument;
                @$dom->loadHTML($html);
                $dom->preserveWhiteSpace = false;
                $images = $dom->getElementsByTagName('img');
                $check = strpos($images[0]->getAttribute('src'),'http');
                if($check === false){
                     echo "<img style='width=420px;height=315px' src='".$url.$images[0]->getAttribute('src')."'alt='image'>";
                }else{

                    echo "<img style='width=420px;height=315px' src='".$images[0]->getAttribute('src')."'alt='image'>";
                }
            ?>
             </div>
        @endif
        <div class="blogPostComment">
        @foreach($comments as $comment)
            @if($medium->id === $comment->postId)
                <h7><br> {{$comment->comment}} <br> posted {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</h7><br>
            @endif
        @endforeach

        {!!   Form::open(array('url' => 'content')) !!}
        <br><p>
            {!! Form::hidden('post', $medium->id) !!}
            {!! Form::label('comment', 'Share your opinion') !!}
            {!! Form::text('comment', Input::old('comment'), array('placeholder' => 'I think ...')) !!}
        </p>

        <!--<p>{!! Form::submit('Post!', array('class' => 'class="btn btn-lg btn-primary btn-block btn-signin"', 'id' => 'btn-post')) !!}</p>-->
        {!! Form::close() !!}
        </div>
    @endforeach
        </div>

@endsection