<?php $__env->startSection('title', 'Sửa thông tin danh mục'); ?>
<?php $__env->startSection('thanhphan', 'Sửa thông tin danh mục sản phẩm'); ?>

<?php $__env->startSection('danhmuc', 'is-expanded'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="<?php echo e($danhMucs->Id); ?>">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Thông tin danh mục</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mã danh mục <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" value="<?php echo e($danhMucs->Id ?? ''); ?>" placeholder="Nhập mã danh mục mới" disabled>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Danh mục sản phẩm <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="DanhMuc" value="<?php echo e($danhMucs->DanhMuc ?? ''); ?>" placeholder="Nhập danh mục sản phẩm mới">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mô tả:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="MoTa" placeholder="Nhập một số thông tin về danh mục"><?php echo e($danhMucs->MoTa ?? ''); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/danhmuc/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?php if(Session('message')): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?php echo e(Session('message')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
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
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="clearix"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/danhmuc/danhmucedit.blade.php ENDPATH**/ ?>