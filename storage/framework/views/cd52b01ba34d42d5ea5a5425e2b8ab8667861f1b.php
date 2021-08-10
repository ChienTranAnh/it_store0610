<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('breadcrumb', 'Register'); ?>
<?php $__env->startSection('body', 'make_appointment'); ?>

<?php $__env->startSection('content'); ?>
    <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="main_heading text_align_center">
                                    <h3>ĐĂNG KÝ THÀNH VIÊN</h3>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 appointment_form">
                                <div class="form_section">
                                    <form class="form_contant" method="POST" action="/register">
                                        <fieldset class="row">
                                            <div class="col-md-12">
                                                <?php if($thongBao): ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <?php echo e($thongBao); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if(Session('message')): ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <?php echo e(Session('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if(count($errors) > 0): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($err); ?></br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="HoTen" type="text" placeholder="Họ tên *" value="<?php echo e($khachHangs->HoTen??''); ?>">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="NgaySinh" id="NgaySinh" type="text" placeholder="Ngày sinh *" value="<?php echo e($khachHangs->NgaySinh??''); ?>">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <select class="field_custom" name="GioiTinh">
                                                    <option value="">- - -</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="DienThoai" placeholder="Số điện thoại *" type="text" value="<?php echo e($khachHangs->DienThoai??''); ?>">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="Email" placeholder="Địa chỉ email *" type="email" value="<?php echo e($khachHangs->Email??''); ?>">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="UserName" placeholder="UserName *" type="text" value="<?php echo e($khachHangs->UserName??''); ?>">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="MatKhau" placeholder="Mật khẩu *" type="password">
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="MatKhau_return" placeholder="Nhập lại mật khẩu *" type="password">
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea style="min-height: 100px;" class="field_custom" name="DiaChi" placeholder="Địa chỉ"><?php echo e($khachHangs->DiaChi??''); ?></textarea>
                                            </div>
                                            <div class="center">
                                                <button type="submit" class="btn main_bt"><i class="fas fa-check-circle"></i> Đăng ký</button>
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
    
    
    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
            // $('#NgaySinh').datepicker({
            //     format: "yyyy-mm-dd",
            //     autoclose: true,
            //     changeMonth: true,
            //     changeYear: true,
            //     todayHighlight: true
            // });
            $( "#NgaySinh" ).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                autoclose: true,
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_register.blade.php ENDPATH**/ ?>