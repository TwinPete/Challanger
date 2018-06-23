<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!

                    <!--<form action="/createPost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" >
                        <textarea name="text" id="" cols="30" rows="10"></textarea>
                        <input type="file" name="media">
                        <input type="submit">
                    </form>-->
                        
                    <h1>Create Post</h1>
                    <?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

                        <?php echo e(Form::label('title', 'Title')); ?>

                        <?php echo e(Form::text('title', '')); ?>

                        <?php echo e(Form::label('text', 'Text')); ?>

                        <?php echo e(Form::text('text', '')); ?>

                        <?php echo e(Form::label('media', 'Upload a Picture or Video')); ?>

                        <?php echo e(Form::file('media')); ?>

                        <?php echo e(Form::submit('Submit')); ?>

                    <?php echo Form::close(); ?>

                    
                    
                    <img src="/storage/userPics/<?php echo e($user->userPic); ?>" height:="auto" width="300px"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>