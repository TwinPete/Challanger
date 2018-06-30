<?php $__env->startSection('content'); ?>




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
<div id="wrapper" class="wrapper">
        
            <div id="line-1" class="line line-1">
                    
                 <?php if(!Auth::guest()): ?> 
                    <div  id="newPost" class="newPost">
                            
                        

                        
                          
                        <img id="newPostImg" src="#" alt="#">
                        <?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

                        
                        <?php echo e(Form::text('title', '', array("class" => "newPostTitle", "placeholder" => 'Title'))); ?>

                        <?php echo e(Form::text('text', '', array("class" => "newPostText", "placeholder" => 'Title'))); ?>

                        <label id="fileLabel" class="button" for="f">Upload a File</label>
                        <?php echo e(Form::file('media', array("id" => "f"))); ?>

                        <?php echo e(Form::submit('Submit', array("class" => "button"))); ?>

                        <?php echo Form::close(); ?>


                      
                    </div>
                 <?php endif; ?>  
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
                    
                    var posts = <?php echo json_encode($posts->toArray()); ?>;
                    //console.log(posts);
                    var user = <?php echo json_encode($user); ?>;

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
                        var trigger = true;
                        
        
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