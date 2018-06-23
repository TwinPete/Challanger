<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PagesController extends Controller
{
    public function landing()
    {
        $users = array();
        $posts = Post::all();
        foreach($posts as $post){
            $users[$post->id] = User::find($post->userId);
        }
        return view('/pages/landing')->with('users', $users)->with('posts', $posts);
        //return $users;
    }
}
