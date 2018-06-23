@extends('layouts.header')

@section('content')
<div id="menu">
    <ul>
        <li>Highest Rated</li>
        <li>Newest</li>
        <li>Personalized</li>
        <li>Personalized</li>
        <li>Create New</li>
    </ul>
</div>
<div id="titles">
    <ul>
        <li>Profiles</li>
        <li>Posts</li>
        <li>Challanges</li>
    </ul>
</div>
<div class="wrapper">
    <div id="line-1" class="line line-1">
        <!-- <div class="post">
            <img class="main_img" src="pic-1.jpg" alt="No Pic found">
            <div class="content">
                <div class="user">
                    <img src="user.jpg" alt="No Pic found" />
                    <p>TwinPete93</p>
                    <l>09.09.2019</l>
                </div>
                <h1>Ich bin verzaubert!</h1>
                <p class="posttext">Heute hab ich wieder einmal ein großartiges Abenteuer erlebt, bei dem ichn etliche
                    neue Erfahrungen machen durfte. Ich kann nicht in Worten ausdrücken was ich alles erlebt habe.
                    Deswegen zeige ich euch einfach die Bilder die ich nebenbei gemacht habe.
                </p>
            </div>
        </div>
        <div class="post">
                <img class="main_img" src="pic-4.jpg" alt="No Pic found">
                <div class="content">
                    <div class="user">
                        <img src="user.jpg" alt="No Pic found" />
                        <p>TwinPete93</p>
                        <l>09.09.2019</l>
                    </div>
                </div>
            </div>-->
    </div> 
    <div id="line-2" class="line line-2">
        @if(count($posts) > 1)
        @foreach($posts as $post)
             <div class="post">
                <img class="main_img" src="../storage/postMedia/{{ $post->media }}" alt="No Pic found">
                <div class="content">
                    <div class="user">
                        <img src="../storage/userPics/{{ $users[$post->id]->userPic }}" alt="No Pic found" />
                    <p>{{ $users[$post->id]->username }}</p>
                        <l>09.09.2019</l>
                    </div>
                    <h1>{{$post->title}}</h1>
                    <p class='posttext'>{{$post->text}}</p>
                </div>
            </div>
        @endforeach
        @else
            <p>No Posts found</p>
        @endif
       
    </div> 
    <div id="line-3" class="line line-3">
        <!-- <div class="post">
            <img class="main_img" src="pic-3.jpg" alt="No Pic found">
            <div class="content">
                <div class="user">
                    <img src="user.jpg" alt="No Pic found" />
                    <p>TwinPete93</p>
                    <l>09.09.2019</l>
                </div>
            </div>
        </div>
        <div class="post">
                <img class="main_img" src="pic-6.jpg" alt="No Pic found">
                <div class="content">
                    <div class="user">
                        <img src="user.jpg" alt="No Pic found" />
                        <p>TwinPete93</p>
                        <l>09.09.2019</l>
                    </div>
                </div>
            </div>
    </div>       -->
</div>
@endsection