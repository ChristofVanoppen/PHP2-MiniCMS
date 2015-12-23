<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
       public function getContent(){

        if (!Auth::check())
        {
            return redirect('/login')->with('error','you need to be logged in.');
        }

        $media = Post::all();

        return view('blog.content',compact('media'));

    }
    public function getAddContent(){

        if (!Auth::check())
        {
            return redirect('/login')->with('message','you need to be logged in.');
        }

        return view('blog.add');

    }

    public function postAddContent(){

        $url = Input::get('url');

        if(strpos($url, 'youtube.com/watch?v=') !== FALSE)
        {

            $type = 'youtube';
            $pieces = explode("v=", $url);
            $mediaId = $pieces[1];

        }
        else if(strpos($url, 'vimeo.com/channels/') !== FALSE)
        {

            $type = 'vimeo';
            $pieces = explode("/", $url);
            $mediaId = $pieces[5];

        }
        else if(strpos($url, 'soundcloud.com/') !== FALSE)
        {

            $type = 'soundcloud';
            $mediaId = 'null';

        }
        else
        {

            return redirect('/content/add')->with('error','Cant use url!');

        }

        $userId = Auth::id();

        $post = new Post();

        $post->url = $url;
        $post->type = $type;
        $post->userId = $userId;
        $post->mediaId = $mediaId;
        $post->save();

        return redirect('/content')->with('success','Post successfully created!');

    }
}

