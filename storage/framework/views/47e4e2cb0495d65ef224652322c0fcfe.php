<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ana Sayfası</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .navbar {
            width: 100%;
            background-color: #343a40;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

        .navbar a {
            float: left;
            display: block;
            color: #ffffff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #495057;
            color: #ffffff;
        }

        .navbar .right {
            float: right;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            color: #343a40;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #e9ecef;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul li strong {
            display: block;
            color: #007bff;
        }

        ul li p {
            color: #495057;
        }

        ul li a {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        ul li a:hover {
            text-decoration: underline;
        }

        .btn-create {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-create:hover {
            background-color: #0056b3;
        }

        .auth-links {
            text-align: right;
            margin-top: 10px;
        }

        .auth-links a {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }


        
    </style>
</head>
<body>
    <div class="navbar">
        <a href="<?php echo e(route('home')); ?>">Ana Sayfa</a>
        <?php if(auth()->guard()->guest()): ?>
            <div class="right">
                <a href="<?php echo e(route('login')); ?>">Giriş Yap</a>
                <a href="<?php echo e(route('register')); ?>">Kayıt Ol</a>
            </div>
        <?php else: ?>
            <div class="right">
                <span>Hoş Geldiniz, <?php echo e(Auth::user()->name); ?></span>
                <a href="<?php echo e(route('logout')); ?>" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Ana İçerik -->
    <div class="container">
        <h1>Posts</h1>
        <?php if(session('success')): ?>
            <p style="color: green;"><?php echo e(session('success')); ?></p>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <p style="color: red;"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
        <ul>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                <strong><a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->post_title); ?></a></strong> by <?php echo e($post->user->name); ?>


                    <p><?php echo e($post->content); ?></p>
                    <?php if($post->user_id == Auth::id()): ?>
                    
                        <a href="<?php echo e(route('posts.edit', $post->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="submit" class="delete-form" value="Delete"></innput>
                    </form>
                                <?php endif; ?>
                            </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="<?php echo e(route('posts.create')); ?>" class="btn-create">Create New Post</a>
    </div>
</body>
</html>
<?php /**PATH C:\Users\rumey\OneDrive\Masaüstü\rumi3.1\resources\views/home.blade.php ENDPATH**/ ?>