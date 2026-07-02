<?php $__env->startSection('content'); ?><h2>Add a comment</h2>

<form action="<?php echo e(route('comments.store', $post->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
    <textarea
        name="comment"
        rows="4"
        class="w-full border rounded-lg p-3"
        placeholder="Write your comment..."
    ></textarea>

    <button
        type="submit"
        class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg"
    >
        Add Comment
    </button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ENAA\Desktop\LinkUp\resources\views/comments/create.blade.php ENDPATH**/ ?>