<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pcomment;
use App\ChallangeComment;
use App\Post;
use App\User;
use App\Challange;
use App\Ccomment;

class PagesController extends Controller
{

    

    public function landing()
    {
        $userId = auth()->user('id');
        $postUsers = array();
        $posts = Post::orderBy('created_at', 'desc')->get();
        //$user = User::all();
        
        
        foreach($posts as $post){
            $postUsers[$post->id] = User::where('Id', $post->userId)->get();
        }
        $postComments = array();
        // foreach($posts as $post){
        //     $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
        // }
        // $postCommentsUsers = array();
        // for($i = 1; $i < count($postComments); $i++){
        //     $postCommentsUsers[$i] = User::where('id', $posts[$i]->userId)->get();
        // }
        $postCommentsUsers = array();
            foreach($posts as $post){
                $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
                foreach($postComments[$post->id] as $comment){
                    $postCommentsUsers[$post->id][$comment->id] = User::find($comment->userId);
                }
            }
        $counter = count($posts);

            // Challanges

        $challanges = Challange::where('isRunning', true)->orderBy('created_at', 'desc')->get();
        $challangeUsers = array();
        foreach($challanges as $challange){
            $challangeUsers[$challange->id] = User::where('Id', $challange->userId)->get();
        }
        $challangeComments = array();
        foreach($challanges as $challange){
            $challangeComments[$challange->id] = Ccomment::where('challangeId', $challange->id)->get();
        }
        $challangeCommentsUsers = array();
            foreach($challanges as $challange){
                $challangeComments[$challange->id] = Ccomment::where('challangeId', $challange->id)->get();
                foreach($challangeComments[$challange->id] as $comment){
                    $challangeCommentsUsers[$challange->id][$comment->id] = User::find($comment->userId);
                }
            }


        return view('/pages/landing')->with('postUsers', $postUsers)->with('posts', $posts)->with('counter', $counter)->with('postComments', $postComments)
        ->with('postCommentsUsers', $postCommentsUsers)->with('userId', $userId)->with('challanges', $challanges)->with('challangeUsers', $challangeUsers)
        ->with('challangeComments', $challangeComments)->with('challangeCommentsUsers', $challangeCommentsUsers);
        //return $posts[0]->id;
        //return $posts;
        //return $users;
        //return $postCommentsUsers;

    }

    public function profile2()
    {
        $user = auth()->user('id');

        // Posts
        $posts = Post::where('userId', $user->id)->orderBy('created_at', 'desc')->get();
        $postComments = array();
        foreach($posts as $post){
            $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
        }
        // $postCommentsUsers = array();
        // for($i = 1; $i < count($postComments); $i++){
        //     $postCommentsUsers[$i] = User::where('id', $posts[$i]->userId)->get();
        // }
        $postCommentsUsers = array();
            foreach($posts as $post){
                $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
                foreach($postComments[$post->id] as $comment){
                    $postCommentsUsers[$post->id][$comment->id] = User::find($comment->userId);
                }
            }

        // Challanges

        $challanges = Challange::where('userId', $user->id)->orderBy('created_at', 'desc')->get();
        $challangeComments = array();
        foreach($challanges as $challange){
            $challangeComments[$challange->id] = Ccomment::where('challangeId', $challange->id)->get();
        }
        $challangeCommentsUsers = array();
            foreach($challanges as $challange){
                $challangeComments[$challange->id] = Ccomment::where('challangeId', $challange->id)->get();
                foreach($challangeComments[$challange->id] as $comment){
                    $challangeCommentsUsers[$challange->id][$comment->id] = User::find($comment->userId);
                }
            }
        
        return view('pages/profile2')->with('posts', $posts)->with('user', $user)->with('postComments', $postComments)
        ->with('postCommentsUsers', $postCommentsUsers)->with('challanges', $challanges)->with('challangeComments', $challangeComments)->with('challangeCommentsUsers', $challangeCommentsUsers);
        //return $user;
        //return $challanges;
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
            $path = $request->file('file')->storeAs('public/tmp', $fileNameToStore);
            //Storage::putFile('', $request->file('media'));
            
        }else{
            $fileNameToStore = 'random.jpg';
        }

        return $fileNameToStore;
        

    }
}
