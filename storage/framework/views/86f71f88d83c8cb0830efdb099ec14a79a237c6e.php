<?php $__env->startSection('title', 'Thêm mới danh mục'); ?>

<?php $__env->startSection('thanhphan', 'Thêm mới danh mục sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="them-moi">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Nhập thông tin danh mục mới</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mã danh mục</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" placeholder="Nhập mã danh mục mới">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Danh mục sản phẩm</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="TenDanhMuc" placeholder="Nhập danh mục sản phẩm mới">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mô tả</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="MoTa" placeholder="Nhập vài thông tin về danh mục"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="danhsach"><i class="fa fa-fw fa-lg fa-backward"></i>Trở về</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="clearix"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanphamdanhmuc/danhmucadd.blade.php ENDPATH**/ ?>