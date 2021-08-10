<?php $__env->startSection('title', 'New blog'); ?>

<?php $__env->startSection('thanhphan', 'New blog'); ?>
<?php $__env->startSection('blog', 'is-expanded'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="them-moi" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Bài viết</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Id:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" name="Id" value="<?php echo e($blogs->Id ?? ''); ?>" placeholder="Mã bài viết mới (không bắt buộc)">
                        </div>

                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Người viết bài <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <?php if(session('user')): ?>
                            <input type="text" class="form-control" id="" value="<?php echo e(session('user')->UserName); ?>" disabled>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Tiêu đề <span class="red">*</span> :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="TieuDe" value="<?php echo e($blogs->TieuDe ?? ''); ?>" placeholder="Nhập tiều đề bài viết mới">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Ảnh bài viết <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="AnhBV">
                            <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                        </div>

                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Chủ đề <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <select class="form-control" name="ChuDeId">
                                <?php if(isset($chuDes)): ?>
                                <option value="">- - - Chủ đề - - -</option>
                                    <?php $__currentLoopData = $chuDes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="MoTa" id="ckeditor" rows="5"><?php echo e($blogs->MoTa ?? ''); ?></textarea>
                            <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
                            <script>
                                CKEDITOR.replace('ckeditor',
                                {
                                    width: '100%',
                                    height: 150
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Nội dung <span class="red">*</span> :</label>
                        <div class="row">
                            <label class="control-label col-md-1"></label>
                            <div class="col-md-10">
                                <textarea class="row form-control" rows="10" name="NoiDung" id="NoiDung"><?php echo e($blogs->NoiDung ?? ''); ?></textarea>
                                <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
                                <script>
                                    CKEDITOR.replace('NoiDung',{
                                        width: '100%',
                                        height: 800
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <label class="control-label col-md-8"></label>
                        <div class="col-md-3 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Thêm mới</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="danhsach"><i class="fas fa-backward"></i>Trở về</a>
                        </div>
                    </div>
                    <div class="row"><label class="col-md-3"></label></div>
                    <div class="row">
                        <label class="col-md-3"></label>
                        <div class="col-md-6">
                            <?php if(Session('message')): ?>
                                <div class="alert alert-warning" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?php echo e(Session('message')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
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
                    <div class="row">
                        <label class="col-md-3"></label>
                        <div class="col-md-6">
                            <div class="alert <?php echo e($class ?? ''); ?>" role="alert">
                                <?php echo e($thongBao ?? ''); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<div class="clearix"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/blog/blogadd.blade.php ENDPATH**/ ?>