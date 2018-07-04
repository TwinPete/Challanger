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
        <li class="active">Posts</li>
        <li>Challanges</li>
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
<div id="wrapper" class="wrapper profileWrapper">
        
            <div id="line-1" class="line line-1">
                    
                 
               
            </div> 
            <div id="line-2" class="line line-2">
        
                
        <script> console.log("los gehts");</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>

                    
                    document.getElementById('line-1').addEventListener("change", function(){
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
                    //console.log(posts);
                    var user = {!! json_encode($user) !!};
                    console.log(user.id);
                    // Id des aktuell angemeldeten Users
                    var authId = {!! json_encode(auth()->user('id')) !!};

                    

                    var postComments = {!! json_encode($postComments) !!};
                    var postCommentsUsers = {!! json_encode($postCommentsUsers) !!};
                    console.log(postComments)


                    // Userbar mit Werten belegen

                    document.getElementById('userPic').src = "../storage/userPics/" + user.userPic;
                    document.getElementById('username').innerHTML =  user.username;
                    
                    
        
                    var counter_3 = 0;
        
                    var counter_2 = 0;
        
        
        
        
                    // Beim Laden der Seiten wird folgende Funktion aufgerufen, die entsprechend der jeweiligen Bildschirmgröße die Posts anordnet
        
                    document.addEventListener("DOMContentLoaded", function(event){
        
                        // Abfragen, welche Größe der Bildschirm hat, um die entsprechende Funktion aufzurufen
        
                        var window = document.documentElement.clientWidth;
                        // alert(window);
        
                        if(window >= 1150){
                            load_lines(3);
                        }
                        if(window <= 1150 && window > 773){
                            load_lines(2);
                        }
        
                        if(window <= 773){
                            
                            load_lines(1);
                            // alert("jetzt");
                        }
        
                    });
        
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
        
                    function load_lines(lines){
                        console.log("Funktion wird gestartet");
                        // Trigger wird auf true gesetzt, falls es sich um das Profil des jeweiligen Users handelt ...
                        // ... bzw. falls die User AUthentifizierungsnummer identiasch mit der Profilnummer ist
                        // if(authId != null){
                        //     var trigger = (user.id == authId.id);
                        // }
                        var trigger = false;
                        
        
                        for(var i = 1; i <= lines; i++){
                            if(counter_3 > (posts.length - 1 )){

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
                            
                            document.getElementById("line-" + i).innerHTML +=  "<div class='post'>" +
                                    "<img class='main_img' src='../storage/postMedia/" +  posts[counter_3].media  + "'alt='No Pic found'>" +
                                    "<div class='content'>" +
                                        "<div class='user'>" +
                                            "<img src='../storage/userPics/" +  user.userPic  + "' alt='No Pic found' />" +
                                            "<p>"+ user.username +"</p>" +
                                            "<l>" + posts[counter_3].updated_at + "</l>" +
                                        "</div>" +
                                        "<h1>"+ posts[counter_3].title +"</h1>" +
                                        "<p class='posttext'> "+ posts[counter_3].text +"</p>" +
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
                                            "<p>" + postComments[posts[counter_3].id].length + " Comments</p>" +
                                            "<img class='commentDropdown' src='/storage/res/dropdown.png' alt='No Pic found' />" + 
                                        "</div>" +
                                        "<div class='comments'>" +
                                            "<form action='/postComment' method='POST' enctype='multipart/form-data'>" +
                                                " <input type='hidden' name='_token' value='{{ csrf_token() }}'> " +
                                               
                                                "<div class='commentInput'>" +
                                                    "<textarea name='comment' placeholder='write a comment'></textarea>" +
                                                    "<input class='postIdForComment' name='postId' type='text' value='"+ posts[counter_3].id +"'>" +
                                                    "<input class='userIdForComment' name='userId' type='hidden' value='"+ authId.id +"'>" +
                                                    "<div class='icons'>" +
                                                        "<img src='/storage/res/emoticon.svg' alt='No Pic found'>" +
                                                        "<img src='/storage/res/paperclip.svg' alt='No Pic found'>" +
                                                        "<img src='/storage/res/camera.svg' alt='No Pic found'>" +
                                                    "</div>" +
                                                "</div>" +
                                                "<input class='postComment' type='submit' value='Post Comment'>" +
                                            "</form>" +
                                            
                                            "<div id='commentList_"+ posts[counter_3].id +"' class='commentList'>" +
                                                    
                                                "</div>" +
                                            
                                                "</div>" +
                                        "</div>" +
                                    "</div>"; 

                                    // Kommentare einfügen
                                    var commentsCount = postComments[posts[counter_3].id].length;
                                    console.log("das ist Post: " + posts[counter_3].id);
                                    console.log("postComments Usewr sind unten:");
                                    console.log(postCommentsUsers[posts[counter_3].id]);
                                    console.log("CommentsCount: " + commentsCount);
                                        if(commentsCount > 0){
                                            
                                            
                                            for(var x = 0; x < commentsCount; x++){
                                                console.log("Aktueller CommentsCount: " + commentsCount);
                                                // console.log("erster Durchgang: Post: " + posts[counter_3] + " Commentar: " + postComments[posts[counter_3].id][0] );
                                            document.getElementById("commentList_"+ posts[counter_3].id).innerHTML +=  "<div class='comment'>" +
                                                            "<div class='commentUser'>" +
                                                                "<a href='/profile/"+postCommentsUsers[posts[counter_3].id][postComments[posts[counter_3].id][x].id].id+"'><img class='userImg' src='/storage/userPics/" + postCommentsUsers[posts[counter_3].id][postComments[posts[counter_3].id][x].id].userPic + "' alt=''></a>" +
                                                                "<a href='/profile/"+postCommentsUsers[posts[counter_3].id][postComments[posts[counter_3].id][x].id].id+"'><p class='CommentUsername'>"+ postCommentsUsers[posts[counter_3].id][postComments[posts[counter_3].id][x].id].username +"</p></a>" +
                                                                "<i class='timestamp'>commented at"+ postComments[posts[counter_3].id][x].created_at +"</i>" +
                                                            "</div>" +
                                                            "<p class='commentText'>"+ postComments[posts[counter_3].id][x].comment +"</p>" +
                                                            "<div class='commentStats'>" +
                                                                "<img src='/storage/res/camera.svg' alt='No Pic Found'>" +
                                                                "<p>Likes: 300</p>" + 
                                                                "<p class='replies'>Replies: 11</p>" +
                                                            "</div>" +
                                                        "</div>";
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
            <div id="line-3" class="line line-3">
                    
        </div>
@endsection