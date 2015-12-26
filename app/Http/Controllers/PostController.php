<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
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
            return redirect('/login')->with('error','You need to be logged in!');
        }

        $media = Post::all();
        $comments = Comment::all();

        return view('blog.content',compact('media',"comments"));

    }
    public function getAddContent(){

        if (!Auth::check())
        {
            return redirect('/login')->with('message','You need to be logged in!');
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

            $type = 'other';
            $mediaId = 'null';

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

    public function postComment(){

        $postComment = Input::get('comment');
        $postId = Input::get('post');
        $userId = Auth::id();

        $comment = new Comment();
        $comment->comment = $postComment;
        $comment->userId = $userId;
        $comment->postId = $postId;
        $comment->save();

        return redirect('/content')->with('success','Post successfully posted!');
    }
}

