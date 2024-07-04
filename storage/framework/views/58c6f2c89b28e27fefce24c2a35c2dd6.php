<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <?php if(session('success')): ?>
        <p><?php echo e(session('success')); ?></p>
    <?php endif; ?>
    <ul>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong><?php echo e($post->post_title); ?></strong> by <?php echo e($post->user->name); ?>

                <p><?php echo e($post->content); ?></p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <a href="<?php echo e(route('posts.create')); ?>">Create New Post</a>
</body>
</html>
<?php /**PATH C:\Users\rumey\OneDrive\Masaüstü\rumi3.1\resources\views/posts/index.blade.php ENDPATH**/ ?>