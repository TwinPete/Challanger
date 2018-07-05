@extends('layouts.header')

@section('content')

{{-- <label id="helperLabel" class="button" for="file">Upload a File<input id="helperFile" name="helperFile" type="file"><p id="filename">Filename</p></label> --}}
{{-- <h1 id="dragtest" >hgfgdh</h1>
<label for="file2" id="fileLabel">
    <input type="file" id="file2" name="file2">
    <span id="filename">Upload a File!!!</span>
</label> --}}

<div id="userbar">
        <div id="userbarContent">
            <img id="userPic" src="" alt="No Pic found" />
            <p id="username"></p>
            <ul id="userstats">
                <li id="likes">Likes: 300</li>
                <li id="followers">Followers: 11</li>
            </ul>
            <button id="follow">Follow</button>
            <button id="sendMessage">Send Message</button>
        </div>
    </div>
<div class="titles profileTitles">
    <ul>
        <li>Info</li>
        <li id="posts" class="active">Posts</li>
        <li id="challanges" >Challanges</li>
        <li>Groups</li>
        <li>Subcribers</li>
        <li>Following</li>
    </ul>
</div>
<div class="mobile_titles mobile_profileTitles">
        <ul class="activeTitle">
            <li class="active">Profiles</li>
        </ul>
        <ul class="dropdownTitles">
            <li>Posts</li>
            <li>Challanges</li>
        </ul>
    </div>
<div id="post-wrapper" class="wrapper profileWrapper">
        
            <div id="line-1-Posts" class="line line-1">
                    
                 @if(!Auth::guest()) 
                  
                    <div  id="newPost" class="newCard">
                            
                        

                        {{-- <form action="/PostsController@store" method="POST" enctype="multipart/form-data"> 
                            {{ csrf_field() }}
                            <img id="newPostImg" src="#" alt="#">
                            <input id="f" type="file" name="media" >
                            <input id="btn" type="text" name="title" class="newPostTitle" placeholder="Title">
                            <input type="text" name="text" class="newPostText" placeholder="Title">
                            <label id="fileLabel" class="button" for="f">Upload a File</label>
                            <input type="submit" class="button" value="post"> 
                         </form>  --}}
                          
                        <img id="newPostImg" src="#" alt="#">
                        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        {{ Form::text('title', '', array("class" => "newPostTitle", "placeholder" => 'Title'))}}
                        {{ Form::text('text', '', array("class" => "newPostText", "placeholder" => 'Title'))}}
                        <label id="fileLabel" class="button" for="f">Upload a File</label>
                        {{ Form::file('media', array("id" => "f"))}}
                        {{ Form::submit('Submit', array("class" => "button"))}}
                        {!! Form::close() !!}

                      
                    </div>
                 @endif  
            </div> 
            <div id="line-2-Posts" class="line line-2">
        
                
        <script> console.log("los gehts");</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>

                    // Event Listener und Funktionen für Menu
                    console.log("1");
                    var postElement = document.getElementById('posts');
                    postElement.addEventListener('click', posts);
                    console.log("2");
                    challangesInitialized = false;
                    var challangeElement = document.getElementById('challanges');
                    challangeElement.addEventListener('click', challanges);

                    function posts(){

                    // Alle anderen Menupunkte auf zurücksetzen

                    challangeElement.classList.remove("active");

                    // Posts auf activ setzen

                    postElement.classList.add("active");

                    // Alle anderen wrapper ausblenden
                    console.log("3");
                    document.getElementById('challange-wrapper').style.display = "none";

                    // Posts laden
                    console.log("4");
                    var postWrapper = document.getElementById('post-wrapper');
                    postWrapper.style.display = "flex";
                    //initialize("Posts");

                    }
                    function challanges(){

                    // Alle anderen Menupunkte auf zurücksetzen

                    postElement.classList.remove("active");
                    
                    // Challanges auf activ setzen

                    challangeElement.classList.add("active");
                     console.log("classlist von ChalangeMenu " + challangeElement.classList[0]);
                    // Alle anderen wrapper ausblenden
                    console.log("5");
                    var postWrapper = document.getElementById('post-wrapper').style.display = "none";

                    // Challanges laden
                    console.log("6");
                    var challangeWrapper = document.getElementById('challange-wrapper');
                    console.log(challangeWrapper);
                    challangeWrapper.style.display = "flex";
                    if(!challangesInitialized){
                        initialize("Challanges");
                    }
                    challangesInitialized = true;
                    }

                    function profiles(){
                    
                    }

                    
                    document.getElementById('line-1-Posts').addEventListener("change", function(){
                        if(document.getElementById('f').files[0].name != ""){
                            var filename = document.getElementById('f').files[0].name;
                            //alert(filename);
                            upload(document.getElementById('f').files[0], filename);
                        }
                    });

                    function upload(file, filename){
                        var formData = new FormData(),
                            xhr = new XMLHttpRequest();
                            
                            formData.append('file', file);

                            xhr.onload = function(){
                                var data = this.responseText;
                                console.log(data);
                            }

                            xhr.open('post', 'api/fileTemp');
                            xhr.send(formData);
                            var newPostImg = document.getElementById('newPostImg');
                            console.log(filename);
                            var t = "/storage/tmp/" + filename;
                            
                            // if(t == null){
                                setTimeout(function(){ 
                                    //alert("Zeit abgelaufen");
                                    newPostImg.style.display = "inline-block";
                                    newPostImg.src = "/storage/tmp/" + filename;
                                }, 1000);
                            // }else{
                            //     newPostImg.src = "/storage/tmp/" + filename;
                            // }
                            
                            

                            document.getElementById('newPost').style.paddingTop = "0";
                            
                    }
                    
                    
                    
                    // Php Variabeln in Javascript Variabeln umwandeln

                    // var auth = ;
                    // alert(auth);
                    
                    var posts = {!! json_encode($posts->toArray()) !!};
                    
                    var user = {!! json_encode($user) !!};
                   
                    // Id des aktuell angemeldeten Users
                    var authId = {!! json_encode(auth()->user('id')) !!};
                    

                    var postComments = {!! json_encode($postComments) !!};
                    var postCommentsUsers = {!! json_encode($postCommentsUsers) !!};
                    console.log(postComments)
                    
                    
                    // Userbar mit Werten belegen

                    document.getElementById('userPic').src = "../storage/userPics/" + authId.userPic;
                    document.getElementById('username').innerHTML =  authId.username;
        
                    var counter_3 = 0;
        
                    var counter_2 = 0;
        
        
        
        
            // Beim Laden der Seiten wird folgende Funktion aufgerufen, die entsprechend der jeweiligen Bildschirmgröße die Posts anordnet
        
            var loadType = document.getElementsByClassName('active')[0].innerHTML;
            document.addEventListener("DOMContentLoaded", function(event){
               
                initialize(loadType);
            });
            function initialize(type){

                

                
                    // Abfragen, welche Größe der Bildschirm hat, um die entsprechende Funktion aufzurufen

                    var window = document.documentElement.clientWidth;
                    // alert(window);

                    if(window >= 1150){
                        if(type == "Posts"){
                            
                            load_lines(3, type);
                        }else if(type == "Challanges"){
                            
                            load_lines(3, type);
                        }else{
                            load_lines(3, type);
                        }
                        
                    }
                    if(window <= 1150 && window > 773){
                        if(type = "posts"){
                            load_lines(2, type);
                        }else if(type == "challanges"){
                            load_lines(1, type);
                        }else{
                            load_lines(1, type);
                        }
                    }

                    if(window <= 773){
                        if(type = "posts"){
                            load_lines(1, type);
                        }else if(type == "challanges"){
                            load_lines(1, type);
                        }else{
                            load_lines(1, type);
                        }
                    }

            

            }
        
                    // Abfragen für Verkleinerungen des Bildschirms
        
                    window.addEventListener("resize", function(event){
                        var window = document.documentElement.clientWidth;
                        var resize;
                            if(window >= 1150){
                                // document.getElementById("line-1").innerHTML +=  "";
                                // document.getElementById("line-2").innerHTML +=  "";
                                // load_lines(3);
                            resize = setTimeout(function(){
                                location.reload();
                            }, 500);
                            }
                            if(window <= 1150){
                                // document.getElementById("line-1").innerHTML +=  "";
                                // document.getElementById("line-2").innerHTML +=  "";
                                // load_lines(2);
                            resize = setTimeout(function(){
                                location.reload();
                                }, 500);
                            }
                    });
        
                    console.log("Funktion wird gleich gestartet");

                  


                    // Ladefunktionen für die Posts
        
                    function load_lines(lines, type){

                        // als Zweites wird bestimmt, welche Art von Inhalt erzeugt werden soll

                        // in die Variable Content werden die entsprechenden Inhalte geladen
                        var content;
                        var comments;
                        var commentUsers;

                        if(type == "Posts"){
                            counter_3 = 0;

                            content = posts;
                            comments = postComments;
                            commentUsers = postCommentsUsers;
                        }else if(type == "Challanges"){
                            
                            console.log("Challanges werden geladen");
                            counter_3 = 0;
                            //content = challanges;
                            content = posts;
                            comments = postComments;
                            commentUsers = postCommentsUsers;
                        }else{
                            console.log("Profile werden geladen");
                        }

                        

                        // Trigger wird auf true gesetzt, falls es sich um das Profil des jeweiligen Users handelt ...
                        // ... bzw. falls die User AUthentifizierungsnummer identiasch mit der Profilnummer ist
                        if(authId != null){
                            var trigger = (user.id == authId.id);
                        }
                        
                        // Bevor die Schleife gestarted wird, werden noch einmal alle lines zurückgesetzt

        
                        for(var i = 1; i <= lines; i++){
                            
                            if(counter_3 > (content.length - 1 )){

                                // Alle Event Listener vergeben
                                var commentDropdowns = document.getElementsByClassName('commentDropdown');
                                var comments = document.getElementsByClassName('comments');
                                
                                
                                // Öffnen/Schließen der Comment Sektion         
                                for(var i = 0; i < commentDropdowns.length; i++){
                                    commentDropdowns[i].classList.add("cd" + i)
                                       commentDropdowns[i].addEventListener('click', function(){
                                          
                                           var commentsNr = this.classList[1].charAt(2);
                                           var c = comments[commentsNr].classList;
                                           if(c.length <= 1){
                                                this.style.transform = "rotate(0deg)";
                                                c.add('commentsActive');
                                                
                                           }else{
                                            this.style.transform = "rotate(-90deg)";
                                            c.remove('commentsActive');
                                           }
                                           
                                       })
                                       
                                }


                                return;
                            }
                            if(i == 0){
                                i = 1;
                            }
        
                            if(trigger){
                               //document.getElementById("line-" + i).innerHTML += '<h1>Hat geklappt</h1>';
                                counter_3 = 0;
                                trigger = false;
                                continue;
                            }

                            // Line holen

                            var line = document.getElementById("line-" + i + "-" + type);

                            // lines zurücksetzen

                            // reset_counter = i;

                            // if(reset_counter > 1 && reset_counter < 3){
                            //     line.innerHTML = "";
                            //     reset_counter++;
                            // }

                            // erneut abfragen, welcher Inhalt geladen wird
                            
                            if(type == "Posts"){
                                
                                line.innerHTML +=  "<div class='card post'>" +
                                        "<img class='main_img' src='/storage/postMedia/" + content[counter_3].media  + "'alt='No Pic found'>" +
                                        "<div class='content'>" +
                                            "<div class='user'>" +
                                                "<img src='../storage/userPics/" +  user.userPic  + "' alt='No Pic found' />" +
                                                "<p>"+ user.username +"</p>" +
                                                "<l>" + content[counter_3].updated_at + "</l>" +
                                            "</div>" +
                                            "<h1>"+ content[counter_3].title +"</h1>" +
                                            "<p class='posttext'> "+ content[counter_3].text +"</p>" +
                                            "<div class='options'>" +
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/like.svg' alt=''>" + 
                                                        "<p>Like</p>" + 
                                                "</div>" + 
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/share.svg' alt=''>" +
                                                        "<p>Share</p>" +
                                                "</div>" +
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/comment.svg' alt=''>" +
                                                        "<p>Comment</p>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class='postStats'>" +
                                                "<p>1000 Likes</p>" +
                                                "<p>" + comments[content[counter_3].id].length + " Comments</p>" +
                                                "<img class='commentDropdown' src='/storage/res/dropdown.png' alt='No Pic found' />" + 
                                            "</div>" +
                                            "<div class='comments'>" +
                                                "<form action='/postComment' method='POST' enctype='multipart/form-data'>" +
                                                    " <input type='hidden' name='_token' value='{{ csrf_token() }}'> " +
                                                
                                                    "<div class='commentInput'>" +
                                                        "<textarea name='comment' placeholder='write a comment'></textarea>" +
                                                        "<input class='postIdForComment' name='postId' type='text' value='"+ content[counter_3].id +"'>" +
                                                        "<input class='userIdForComment' name='userId' type='hidden' value='"+ authId.id +"'>" +
                                                        "<div class='icons'>" +
                                                            "<img src='/storage/res/emoticon.svg' alt='No Pic found'>" +
                                                            "<img src='/storage/res/paperclip.svg' alt='No Pic found'>" +
                                                            "<img src='/storage/res/camera.svg' alt='No Pic found'>" +
                                                        "</div>" +
                                                    "</div>" +
                                                    "<input class='postComment' type='submit' value='Post Comment'>" +
                                                "</form>" +
                                                
                                                "<div id='"+ type +"CommentList_"+ content[counter_3].id +"' class='commentList'>" +
                                                        
                                                    "</div>" +
                                                
                                                    "</div>" +
                                            "</div>" +
                                        "</div>"; 

                            }else if(type == "Challanges"){
                               
                                line.innerHTML +=  "<div class='card post'>" +
                                        "<div class='content'>" +
                                            "<div class='user'>" +
                                                "<img src='../storage/userPics/" +  user.userPic  + "' alt='No Pic found' />" +
                                                "<p>"+ user.username +"</p>" +
                                                "<l>" + content[counter_3].updated_at + "</l>" +
                                            "</div>" +
                                            "<h1>"+ content[counter_3].title +"</h1>" +
                                            "<p class='posttext'> "+ content[counter_3].text +"</p>" +
                                            "<p class='reward'>Reward: 500$</p>" +
                                            "<p class='deadline'>Deadline:<span> 20.09.2018 at 15:30pm </span></p>" +
                                            "<div class='options'>" +
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/like.svg' alt=''>" + 
                                                        "<p>Like</p>" + 
                                                "</div>" + 
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/share.svg' alt=''>" +
                                                        "<p>Share</p>" +
                                                "</div>" +
                                                "<div class='option'>" +
                                                        "<img src='/storage/res/comment.svg' alt=''>" +
                                                        "<p>Comment</p>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class='postStats'>" +
                                                "<p>1000 Likes</p>" +
                                                "<p>" + comments[content[counter_3].id].length + " Comments</p>" +
                                                "<img class='commentDropdown' src='/storage/res/dropdown.png' alt='No Pic found' />" + 
                                            "</div>" +
                                            "<div class='comments'>" +
                                                "<form action='/postComment' method='POST' enctype='multipart/form-data'>" +
                                                    " <input type='hidden' name='_token' value='{{ csrf_token() }}'> " +
                                                
                                                    "<div class='commentInput'>" +
                                                        "<textarea name='comment' placeholder='write a comment'></textarea>" +
                                                        "<input class='postIdForComment' name='postId' type='text' value='"+ content[counter_3].id +"'>" +
                                                        "<input class='userIdForComment' name='userId' type='hidden' value='"+ authId.id +"'>" +
                                                        "<div class='icons'>" +
                                                            "<img src='/storage/res/emoticon.svg' alt='No Pic found'>" +
                                                            "<img src='/storage/res/paperclip.svg' alt='No Pic found'>" +
                                                            "<img src='/storage/res/camera.svg' alt='No Pic found'>" +
                                                        "</div>" +
                                                    "</div>" +
                                                    "<input class='postComment' type='submit' value='Post Comment'>" +
                                                "</form>" +
                                                
                                                "<div id='"+ type +"CommentList_"+ content[counter_3].id +"' class='commentList'>" +
                                                        
                                                    "</div>" +
                                                
                                                    "</div>" +
                                            "</div>" +
                                        "</div>"; 
                            }



                                                console.log("Aktuelles Bild heißt: " + content[counter_3].media);
                                    // Kommentare einfügen

                                    // Kommentare werden gezählt

                                    var commentsCount = comments[content[counter_3].id].length;

                                    
                                    // es wird eine Variable für die CommentList Identifikation erzeugt

                                    var commentList = type + "CommentList_";

                                    // Dann wird erneut abgefragt, um welche Art von Inhalt es sich handelt
                                    
                                    // if(type == "Posts"){
                                    //     commentList = "postCommentList_";
                                    // }else if(type == "Challanges"){
                                    //     commentList = "challangeCommentList_";
                                    // }else{
                                    //     commentList = "profileCommentList_";
                                    // }
                                    

                                    //console.log("aktuellesUserPic: " + postCommentsUsers[1][0].userPic);
                                        if(commentsCount > 0){
                                            
                                            console.log("Array in diesem Durchgang größer als 0");
                                            for(var x = 0; x < commentsCount; x++){
                                                var commentUser = commentUsers[content[counter_3].id][comments[content[counter_3].id][x].id];
                                                if(commentUser != null){
                                                // console.log("erster Durchgang: Post: " + posts[counter_3] + " Commentar: " + postComments[posts[counter_3].id][0] );
                                            document.getElementById(commentList + content[counter_3].id).innerHTML +=  "<div class='comment'>" +
                                                            "<div class='commentUser'>" +
                                                                "<a href='/profile/"+commentUser.id+"'><img class='userImg' src='/storage/userPics/" + commentUser.userPic + "' alt=''></a>" +
                                                                "<a href='/profile/"+commentUser.id+"'><p class='commentUsername'>"+ commentUser.username +"</p></a>" +
                                                                "<i class='timestamp'>commented at"+ comments[content[counter_3].id][x].created_at +"</i>" +
                                                            "</div>" +
                                                            "<p class='commentText'>"+ comments[content[counter_3].id][x].comment +"</p>" +
                                                            "<div class='commentStats'>" +
                                                                "<img src='/storage/res/camera.svg' alt='No Pic Found'>" +
                                                                "<p>Likes: 300</p>" + 
                                                                "<p class='replies'>Replies: 11</p>" +
                                                            "</div>" +
                                                        "</div>";
                                                }
                                        }
                                    }
                                    

                            counter_3++;
                            console.log(counter_3 + ". Runde");
                            if(i == lines){
                                i = 0;
                            }
                        }
                        
                        
                    }
        
                    
                    

                


                </script>
                {{-- @if(count($posts) > 1)
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
                @endif --}}
               
            </div> 
            <div id="line-3-Posts" class="line line-3">
                    
        </div>

</div>
<div id="challange-wrapper" class="wrapper profileWrapper">
        
    <div id="line-1-Challanges" class="line line-1">
            <div  id="newChallange" class="newCard">
                    {!! Form::open(['action' => 'ChallangesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{ Form::text('title', '', array("class" => "newPostTitle", "placeholder" => 'Title'))}}
                    {{ Form::textarea('description', '', array("class" => "newPostText", "placeholder" => 'Description'))}}
                    {{ Form::date('deadline', '', array("class" => "newPostText", "placeholder" => 'Deadline'))}}
                    {{ Form::textarea('reward', '', array("class" => "newPostText", "placeholder" => 'Reward'))}}
                    {{ Form::textarea('whoWins', '', array("class" => "newPostText", "placeholder" => 'Who Wins'))}}
                    {{ Form::submit('Submit', array("class" => "button"))}}
                    {!! Form::close() !!}
            </div>
    </div>
    <div id="line-2-Challanges" class="line line-2">

    </div>
    <div id="line-3-Challanges" class="line line-3"></div>
</div>
  
@endsection