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
<p id="counter">
    {{ $counter }}
</p>
    <div id="line-1" class="line line-1">
             
    </div> 
    <div id="line-2" class="line line-2">

        
<script> console.log("los gehts");</script>

        <script>
            
            var posts = {!! json_encode($posts->toArray()) !!};
            var users = {!! json_encode($users) !!};
            console.log(users[2]);
            
            
            // Source der Bilder für die jeweiligen Posts

            //var pics = ["pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg", "pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg"];

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
                
                

                for(var i = 1; i <= lines; i++){
                    if(counter_3 > (posts.length - 1 )){
                        return;
                    }
                    if(i == 0){
                        i = 1;
                    }

                    

                    document.getElementById("line-" + i).innerHTML +=  "<div class='post'>" +
                            "<img class='main_img' src='../storage/postMedia/" +  posts[counter_3].media  + "'alt='No Pic found'>" +
                            "<div class='content'>" +
                                "<div class='user'>" +
                                    "<img src='../storage/userPics/" +  users[posts[counter_3].id][0].userPic  + "' alt='No Pic found' />" +
                                    "<p>"+ users[posts[counter_3].id][0].username +"</p>" +
                                    "<l>09.09.2019</l>" +
                                "</div>" +
                                "<h1>"+ posts[counter_3].title +"</h1>" +
                                "<p class='posttext'> "+ posts[counter_3].text +"</p" +
                            "</div>" +
                        "</div>"; 
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