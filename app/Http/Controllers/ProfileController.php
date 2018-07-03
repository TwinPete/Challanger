<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pcomment;
use App\ChallangeComment;
use App\Post;
use App\User;
use App\Challange;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // checken, ob User angemeldet ist:
        $userId = auth()->user('id');
        if($userId == null){
            return view('/auth/login');
        }else
        {
                // gewähltes Profil wird ausgesucht
            $a = User::all();
            $user = $a[$id-1];
            // Posts des jeweiligen Profils werden geladen

            $posts = Post::where('userId', $user->id)->orderBy('created_at', 'desc')->get();

            // Alle Kommentare der Posts werden geladen

            $postComments = array();
            $postCommentsUsers = array();
            foreach($posts as $post){
                $postComments[$post->id] = Pcomment::where('postId', $post->id)->get();
                foreach($postComments[$post->id] as $comment){
                    $postCommentsUsers[$post->id][$comment->id] = User::find($comment->userId);
                }
            }

            // Alle User aller Kommentare aller Posts werden geladen
            //$postCommentsUsers = 3;
            
            $p = array();
            
            
            // }
            // Weiterleitung an Profil2 mit allen Variabeln
            return view('/pages/profile')->with('user', $user)->with('posts', $posts)->with('postComments', $postComments)
            ->with('postCommentsUsers', $postCommentsUsers);
            //return $postCommentsUsers;
            //return $postCommentsUsers;
            // return $authId;
            //return $postComments;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
