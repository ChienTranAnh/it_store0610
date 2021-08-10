<?php $__env->startSection('title', 'Error 404'); ?>
<?php $__env->startSection('thanhphan', 'Error 404'); ?>

<?php $__env->startSection('content'); ?>
    <div style="height: 70%" class="content">
        <div class="page-error tile">
            <h1><i class="fa fa-exclamation-circle"></i> Error 404: Opps, Page not found!</h1>
            <p>The page you have requested is not found.</p>
            <a href="javascript:window.history.back();"><button class="btn btn-primary"><i class="fas fa-undo-alt"></i>Quay lại</button></a>
            <?php if(Session('message')): ?>
                <div class="alert alert-warning" role="alert">
                    <h4><?php echo e(Session('message')); ?></h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/errorPage.blade.php ENDPATH**/ ?>