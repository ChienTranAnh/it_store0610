<?php $__env->startSection('title', 'Cập nhật thông tin sản phẩm'); ?>
<?php $__env->startSection('thanhphan', 'Cập nhật sản phẩm'); ?>

<?php $__env->startSection('nguoidung', 'is-expanded'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="/nguoidung/sua/<?php echo e($nguoiDung->Id); ?>" enctype="multipart/form-data">
        </form>
    </div>
    <div class="clearix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/user/useredit.blade.php ENDPATH**/ ?>