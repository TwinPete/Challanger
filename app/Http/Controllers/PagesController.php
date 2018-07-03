<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pcomment;
use App\ChallangeComment;
use App\Post;
use App\User;
use App\Challange;

class PagesController extends Controller
{

    

    public function landing()
    {
        $userId = auth()->user('id');
        $users = array();
        $posts = Post::orderBy('created_at', 'desc')->get();
        //$user = User::all();
        $users = array();
        
        foreach($posts as $post){
            $users[$post->id] = User::where('Id', $post->userId)->get();
        }
        $postComments = array();
        foreach($posts as $post){
            $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
        }
        $postCommentsUsers = array();
        for($i = 1; $i < count($postComments); $i++){
            $postCommentsUsers[$i] = User::where('id', $posts[$i]->userId)->get();
        }
        $counter = count($posts);
        return view('/pages/landing')->with('users', $users)->with('posts', $posts)->with('counter', $counter)->with('postComments', $postComments)
        ->with('postCommentsUsers', $postCommentsUsers)->with('userId', $userId);
        //return $posts[0]->id;
        //return $posts;
        //return $users;
    }

    public function profile2()
    {
        $user = auth()->user('id');
        $posts = Post::where('userId', $user->id)->orderBy('created_at', 'desc')->get();
        $postComments = array();
        foreach($posts as $post){
            $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
        }
        $postCommentsUsers = array();
        for($i = 1; $i < count($postComments); $i++){
            $postCommentsUsers[$i] = User::where('id', $posts[$i]->userId)->get();
        }
        return view('pages/profile2')->with('posts', $posts)->with('user', $user)->with('postComments', $postComments)
        ->with('postCommentsUsers', $postCommentsUsers);
        //return $postCommentsUsers;
    }

    public function test(){
        return view('/auth/login');
    }


    public function fileTemp(Request $request){
        
        header('content-Type: application/json');

        // if(!empty($_FILES['file']['name'][0])){
        //     //$path = $_FILES['file']->storeAs('public/tmp', $_FILES['file']['name']);
        //     //move_uploaded_file($_FILES['file']['tmp_name'], '/Applications/XAMPP/xamppfiles/htdocs/challanger/public/storage/tmp');
        //     //return $_FILES['file'];
            
            
        // }
        If($request->hasFile('file')){

            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            // Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'.'.$extension;
            // Upload the Image
            $path = $request->file('file')->move_uploaded_file('/Applications/XAMPP/xamppfiles/htdocs/challanger/routes', $fileNameToStore);
        }else{
            $fileNameToStore = 'random.jpg';
        }

        return $fileNameToStore;
        

    }
}
