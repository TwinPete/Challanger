<?php $__env->startSection('content'); ?>
<div id="menu">
    <ul>
        <li>Highest Rated</li>
        <li class="active">Newest</li>
        <li>Personalized</li>
        <li>Personalized</li>
        <li>Create New</li>
    </ul>
</div>
<div class="mobile_menu">
    <ul class="activeMenu">
        <li class="active">Highest Rated</li>
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
        <li>Profiles</li>
    </ul>
    <ul>
        <li class="active">Posts</li>
        <li>Challanges</li>
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
<div class="wrapper">
<p id="counter">
    <?php echo e($counter); ?>

</p>
    <div id="line-1" class="line line-1">
             
    </div> 
    <div id="line-2" class="line line-2">

        
<script> console.log("los gehts");</script>

        <script>
            
            var posts = <?php echo json_encode($posts->toArray()); ?>;
            var users = <?php echo json_encode($users); ?>;
            console.log(users[2]);
            var postComments = <?php echo json_encode($postComments); ?>;
            var postCommentsUsers = <?php echo json_encode($postCommentsUsers); ?>;
            console.log(postComments)
            
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

                        // Alle Event Listener vergeben
                        var commentDropdowns = document.getElementsByClassName('commentDropdown');
                                var comments = document.getElementsByClassName('comments');
                                
                                //console.log(comments[1].classList);
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

                    

                    document.getElementById("line-" + i).innerHTML +=  "<div class='post'>" +
                            "<img class='main_img' src='../storage/postMedia/" +  posts[counter_3].media  + "'alt='No Pic found'>" +
                            "<div class='content'>" +
                                "<div class='user'>" +
                                    "<img src='../storage/userPics/" +  users[posts[counter_3].id][0].userPic  + "' alt='No Pic found' />" +
                                    "<p>"+ users[posts[counter_3].id][0].username +"</p>" +
                                    "<l>09.09.2019</l>" +
                                "</div>" +
                                "<h1>"+ posts[counter_3].title +"</h1>" +
                                "<p class='posttext'> "+ posts[counter_3].text +"</p>" +
                                    "<div class='options'>" +
                                            "<div class='option'>" +
                                                    "<img src='/storage/res/like.svg' alt=''>" + 
                                                    "<p>Like</p>" + 
                                            "</div>" + 
                                            "<div class'option'>" +
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
                                                " <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'> " +
                                                "<div class='commentInput'>" +
                                                    "<textarea name='comment' placeholder='write a comment'></textarea>" +
                                                    "<input class='postIdForComment' name='postId' type='text' value='"+ posts[counter_3].id +"'>" +
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
                                    console.log("aktuellesUserPic: " + postCommentsUsers[1][0].userPic);
                                        if(commentsCount > 0){
                                            
                                            console.log("Array in diesem Durchgang größer als 0");
                                            for(var x = 0; x < commentsCount; x++){
                                                // console.log("erster Durchgang: Post: " + posts[counter_3] + " Commentar: " + postComments[posts[counter_3].id][0] );
                                            document.getElementById("commentList_"+ posts[counter_3].id).innerHTML +=  "<div class='comment'>" +
                                                            "<div class='commentUser'>" +
                                                                "<img class='userImg' src='/storage/userPics/" + postCommentsUsers[counter_3][0].userPic + "' alt=''>" +
                                                                "<p class='username'>"+ postCommentsUsers[counter_3][0].username +"</p>" +
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
        
       
    </div> 
    <div id="line-3" class="line line-3">
            
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>