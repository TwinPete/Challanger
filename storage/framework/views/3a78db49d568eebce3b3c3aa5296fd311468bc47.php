<?php $__env->startSection('content'); ?>
<div id="menu">
    <ul>
        <li>Highest Rated</li>
        <li class="activeMenu">Newest</li>
        <li>Personalized</li>
        <li>Personalized</li>
        <li>Create New</li>
    </ul>
</div>
<div class="mobile_menu">
    <ul class="currentMobileMenu">
        <li class="activeMenuMobile">Highest Rated</li>
    </ul>
    <ul class="dropdown_menu">
        <li>Newest</li>
        <li>Personalized</li>
        <li>Personalized</li>
        <li>Create New</li>
    </ul>
</div>
<div class="titles">
    <ul>
        <li id="profiles">Profiles</li>
    </ul>
    <ul>
        <li id="posts" class="active">Posts</li>
        <li id="challanges">Challanges</li>
    </ul>
</div>
<div class="mobile_titles">
    <ul class="activeTitle">
        <li class="active">Profiles</li>
    </ul>
    <ul class="dropdownTitles">
        <li>Posts</li>
        <li>Challanges</li>
    </ul>
</div>
<div id="post-wrapper" class="wrapper">
<p id="counter">
    <?php echo e($counter); ?>

</p>
    <div id="line-1-Posts" class="line line-1">
             
    </div> 
    <div id="line-2-Posts" class="line line-2">

        
<script> console.log("los gehts");</script>

        <script>

            // Event Listener und Funktionen für Menu

            var postElement = document.getElementById('posts');
            postElement.addEventListener('click', posts);
                    
            var challangesInitialized = false;
            var challangeElement = document.getElementById('challanges');
            challangeElement.addEventListener('click', challanges);

            function posts(){

                // Alle anderen Menupunkte auf zurücksetzen

                challangeElement.classList.remove("active");
                

                // Posts auf activ setzen

                postElement.classList.add("active")

                // Alle anderen wrapper ausblenden

                var challangeWrapper = document.getElementById('challange-wrapper').style.display = "none";
                var profileWrapper = document.getElementById('profile-wrapper').style.display = "none";

                // Posts laden

                var postWrapper = document.getElementById('post-wrapper');
                postWrapper.style.display = "flex";
                //initialize("Posts");

            }
            function challanges(){

                // Alle anderen Menupunkte auf zurücksetzen

                postElement.classList.remove("active");
                

                // Challanges auf activ setzen

                challangeElement.classList.add("active");

                // Alle anderen wrapper ausblenden

                var postWrapper = document.getElementById('post-wrapper').style.display = "none";
                var profileWrapper = document.getElementById('profile-wrapper').style.display = "none";
                // alert("challanges are initialized");

                // Challanges laden

                var challangeWrapper = document.getElementById('challange-wrapper');
                challangeWrapper.style.display = "flex";

                console.log("posts aufgelistet");
                console.log(posts);
                console.log("challanges aufgelistet");
                console.log(challanges);
    
                if(!challangesInitialized){
                        initialize("Challanges");
                    }
                challangesInitialized = true;
                    
            }
            function profiles(){
                
            }


            // Php Variabeln für Posts in JavaScript Variabeln umwandeln

            var posts = <?php echo json_encode($posts->toArray()); ?>;
            var postUsers = <?php echo json_encode($postUsers); ?>;
            
            var authId = <?php echo json_encode(auth()->user('id')); ?>;
            var postComments = <?php echo json_encode($postComments); ?>;
            var postCommentsUsers = <?php echo json_encode($postCommentsUsers); ?>;
            
            var challanges = <?php echo json_encode($challanges->toArray()); ?>;
            var challangeUsers = <?php echo json_encode($challangeUsers); ?>;
            var challangeComments = <?php echo json_encode($challangeComments); ?>;
            var challangeCommentsUsers = <?php echo json_encode($challangeCommentsUsers); ?>;
            
            // Source der Bilder für die jeweiligen Posts

            //var pics = ["pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg", "pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg"];

            var counter_3 = 0;

            var counter_2 = 0;




            // Beim Laden der Seiten wird folgende Funktion aufgerufen, die entsprechend der Menuauswahl und der jeweiligen Bildschirmgröße die Posts/challanges oder Profile anordnet
            
            // zuerst wird abgefragt, welcher Menupunkt gerade aktiv ist und damit ob Posts,Challanges oder Profile geladen werden sollen
            
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
                            load_lines(2, type);
                        }else{
                            load_lines(2, type);
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
                console.log("Funktion wird gestartet mit " + type);
                // als Zweites wird bestimmt, welche Art von Inhalt erzeugt werden soll

                        // in die Variable Content werden die entsprechenden Inhalte geladen
                        var content;
                        var users;
                        var comments;
                        var commentUsers;

                        if(type == "Posts"){
                            counter_3 = 0;

                            content = posts;
                            users = postUsers;
                            comments = postComments;
                            commentUsers = postCommentsUsers;
                        }else if(type == "Challanges"){
                            
                            console.log("Challanges werden geladen");
                            counter_3 = 0;
                            users = challangeUsers;
                            content = challanges;
                            comments = challangeComments;
                            commentUsers = challangeCommentsUsers;
                            console.log("username ist: ");
                            console.log(users);
                        }else{
                            console.log("Profile werden geladen");
                        }

                // Posts nacheinander erstellen

                for(var i = 1; i <= lines; i++){
                    if(counter_3 > (content.length - 1 )){

                        // Alle Event Listener vergeben

                        // Buttons

                        // Load More

                        // Countdown, da der Loadmore Button anfangs zu früh zu sehen ist
                        setTimeout(function(){ 
                            document.getElementById('loadMore').style.display = "inline-block";
                            }, 300);
                    
                        document.getElementById('loadMore').addEventListener('click', function(){
                            this.style.backgroundColor = "rgb(245, 245, 245)";
                        });

                        // Dropdown für Post Kommentare
                        var commentDropdowns = document.getElementsByClassName('commentDropdown');
                                var comments = document.getElementsByClassName('comments');
                                
                                //console.log(comments[1].classList);
                                 // Öffnen/Schließen der Comment Sektion         
                                for(var i = 0; i < commentDropdowns.length; i++){
                                    commentDropdowns[i].classList.add("cd" + i)
                                       commentDropdowns[i].addEventListener('click', function(){
                                          
                                           var commentsNr = this.classList[1].slice(2);
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

                     // Line holen

                    var line = document.getElementById("line-" + i + "-" + type);

                    // line leeren bzw. zurücksetzen

                    // abfragen, mit welchen Inhalzten line gefüllt werden soll: Posts, challanges, posts?

                    

                    if(type == "Posts"){

                        // line mit Inhalten füllen

                        line.innerHTML +=  "<div class='card post'>" +
                                "<img class='main_img' src='../storage/postMedia/" +  content[counter_3].media  + "'alt='No Pic found'>" +
                                "<div class='content'>" +
                                    "<div class='user'>" +
                                        "<a href='/profile/" +users[content[counter_3].id][0].id + "'><img src='../storage/userPics/" +  users[content[counter_3].id][0].userPic  + "' alt='No Pic found' /></a>" +
                                        "<a href='/profile/" +users[content[counter_3].id][0].id + "'><p>"+ users[content[counter_3].id][0].username +"</p></a>" +
                                        "<l>09.09.2019</l>" +
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
                                                "<form id='"+ type +"CommentForm_"+content[counter_3].id+"' action='/postComment' method='POST' enctype='multipart/form-data'>" +
                                                    
                                                "</form>" +
                                                
                                                "<div id='"+ type +"CommentList_"+ content[counter_3].id +"' class='commentList'>" +
                                                        
                                                    "</div>" +
                                                
                                                    "</div>" +
                                                
                                "</div>" +
                            "</div>"; 
                    }else if(type == "Challanges"){
                        //var n = counter_3+1;
                        //console.log("n ist: " + n);
                               console.log("challanges werden initialisiert");
                               console.log("counter ist: " + counter_3);
                               //var hilf = counter_3;
                               console.log("User ist: ");
                            //    console.log(users[counter_3][0].username + " und counter immer noch: " + counter_3);
                            //    console.log("Content an der stelle counter_3");
                               console.log(content);
                               line.innerHTML +=  "<div class='card post'>" +
                                       "<div class='content'>" +
                                           "<div class='user'>" +
                                                "<a href='/profile/" +users[content[counter_3].id][0].id + "'><img src='../storage/userPics/" +  users[content[counter_3].id][0].userPic  + "' alt='No Pic found' /></a>" +
                                                "<a href='/profile/" +users[content[counter_3].id][0].id + "'><p>"+ users[content[counter_3].id][0].username +"</p></a>" +
                                               "<l>" + content[counter_3].updated_at + "</l>" +
                                           "</div>" +
                                           "<h1>"+ content[counter_3].title +"</h1>" +
                                           "<p class='posttext'> "+ content[counter_3].text +"</p>" +
                                           "<p class='reward'>Participants: 46</p>" +
                                           "<p class='reward'>Reward: 500$</p>" +
                                           "<p class='deadline'>Deadline:<span> 20.09.2018 at 15:30pm </span></p>" +
                                           "<div class='buttonWrapper'><button class='button'> Accept Challange </button></div>" +
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
                                               "<form id='"+ type +"CommentForm_"+content[counter_3].id+"' action='/postComment' method='POST' enctype='multipart/form-data'>" +
                                                   
                                               "</form>" +
                                               
                                               "<div id='"+ type +"CommentList_"+ content[counter_3].id +"' class='commentList'>" +
                                                       
                                                   "</div>" +
                                               
                                                   "</div>" +
                                           "</div>" +
                                       "</div>"; 
                           }



                        // Kommentar schreiben Input einfügen

                        if(authId != null){
                            console.log("geht zumindest in die Funkiton. AuthId: " + authId.id);
                            document.getElementById(type + "CommentForm_" + content[counter_3].id).innerHTML = " <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'> " +
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
                                                "<input class='postComment' type='submit' value='Post Comment'>" ;
                        }else{
                            console.log("Aktueller User ist nocht eingeloggt");
                        }

                        
                        

                         // Kommentare einfügen
                         var commentsCount = comments[content[counter_3].id].length;

                         // es wird eine Variable für die CommentList Identifikation erzeugt

                        var commentList = type + "CommentList_";

                                    
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
       
    </div> 
    <div id="line-3-Posts" class="line line-3">

    </div>

    

</div>


<div id="challange-wrapper" class="wrapper">
    <div id="line-1-Challanges" class="line line-1"></div> 
    <div id="line-2-Challanges" class="line line-2"></div>
    <div id="line-3-Challanges" class="line line-3"></div>
</div>
<div id="profile-wrapper">
        <div id="line-1-challange" class="line line-1"></div> 
        <div id="line-2-challange" class="line line-2"></div>
        <div id="line-3-challange" class="line line-3"></div>
    </div>
    <div class="loadMoreWrapper">
            <button id="loadMore" class="loadMore">Load More</button>     
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>