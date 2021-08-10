

<?php $__env->startSection('title', 'Lỗi 404'); ?>
<?php $__env->startSection('breadcrumb', 'Lỗi 404'); ?>
<?php $__env->startSection('body', 'it_error'); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="center margin_bottom_30_all"> <img class="margin_bottom_30_all" src="/It_next/images/it_service/404_error_img.png" alt="Lỗi 404"> </div>
        <div class="heading text_align_center">
          <h2>OOOPS, THIS PAGE COULD NOT BE FOUND!</h2>
        </div>
        <div class="center"> <a class="btn sqaure_bt light_theme_bt" href="/trangchu">Trở lại trang chủ</a> </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_error.blade.php ENDPATH**/ ?>