

<?php $__env->startSection('title', 'Liên hệ'); ?>

<?php $__env->startSection('breadcrumb', 'Liên hệ'); ?>
<?php $__env->startSection('body', 'contact_us_2'); ?>

<?php $__env->startSection('content'); ?>
    <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="full">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="main_heading text_align_center">
                <h2>THÔNG TIN LIÊN HỆ</h2>
              </div>
            </div>
            <div class="contact_information">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>Tầng 2 số 20 cuối ngõ 100 Nguyễn Chí Thanh, Đống Đa</h4>
                    <p>Hà Nội, Việt Nam</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>+84 91 491 2019</h4>
                    <p>Thứ 2 - thứ 6 8:30am-6:00pm</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                <div class="information_bottom text_align_center">
                  <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                  <div class="info_cont">
                    <h4>tachienn@gmail.com</h4>
                    <p>24/7 online support</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
              <h3 class="text_align_center">GỬI THÔNG ĐIỆP CHO CHÚNG TÔI</h3>
              <div class="form_section">
                <form class="form_contant" action="index.html">
                  <fieldset>
                  <div class="row">
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Địa chỉ Website" type="text">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Tên của bạn" type="text">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Địa chị email" type="email">
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Số điện thoại" type="text">
                    </div>
                    <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <textarea class="field_custom" placeholder="Bạn muốn gửi gắm . . .?"></textarea>
                    </div>
                    <div class="center"><a class="btn main_bt" href="#">GỬI NGAY</a></div>
                  </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- zoom effect -->
<script src="<?php echo e(asset('/It_next/js/hizoom.js')); ?>"></script>
<script>
    $('.hi1').hiZoom({
        width: 300,
        position: 'right'
    });
    $('.hi2').hiZoom({
        width: 400,
        position: 'right'
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_contact.blade.php ENDPATH**/ ?>