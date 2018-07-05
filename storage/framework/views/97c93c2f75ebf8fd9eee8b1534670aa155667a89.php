<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Challanger')); ?></title>

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    
</head>
<body id="body">
    <div id="header">
        
        <div id="searchbar">
            <input type="text" placeholder="search">
            <div id="searchbutton">
                <img src="/storage/res/search_icon.png" alt="No Pic found">
            </div>
        </div>
        <ul class="header-ul">
            <?php if(Auth::guest()): ?>
                            <li>What is Challanger?</li>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li><a href="/profile2">My Profile</a></li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                
                          
                        <?php endif; ?>
        </ul>
    </div>

    <?php echo $__env->yieldContent('content'); ?>
    


</body>
</html>