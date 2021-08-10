<?php $__env->startSection('title', 'Thêm mới sản phẩm'); ?>

<?php $__env->startSection('thanhphan', 'Thêm mới sản phẩm'); ?>
<?php $__env->startSection('sanpham', 'is-expanded'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="them-moi" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Nhập thông tin sản phẩm mới</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Id:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" name="Id" value="<?php echo e($sanPhams->Id ?? ''); ?>" placeholder="Mã sản phẩm mới (không bắt buộc)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Tên sản phẩm <span class="red">*</span> :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="TenSanPham" value="<?php echo e($sanPhams->TenSanPham ?? ''); ?>" placeholder="Nhập tên sản phẩm mới">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Giá sản phẩm <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input class="form-control" type="number" name="GiaSanPham" value="<?php echo e($sanPhams->GiaSanPham ?? ''); ?>" placeholder="Nhập giá sản phẩm">
                            </div>
                        </div>
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Giá khuyến mại:</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input class="form-control" type="number" name="GiaKhuyenMai" value="<?php echo e($sanPhams->GiaKhuyenMai ?? ''); ?>" placeholder="Nhập giá khuyến mại (nếu có)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Số lượng:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" name="SoLuong" value="<?php echo e($sanPhams->SoLuong ?? ''); ?>" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Trạng thái <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <select class="form-control" name="TrangThaiId">
                                <?php if(isset($trangThais)): ?>
                                    <?php $__currentLoopData = $trangThais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Ảnh sản phẩm <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="AnhSP">
                            <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                        </div>
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Đơn vị:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="DonVi" value="<?php echo e($sanPhams->DonVi ?? ''); ?>" placeholder="Đơn vị tính">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Danh mục sản phẩm <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <select class="form-control" name="DanhMucId">
                                <option value="">-- Danh mục sản phẩm --</option>
                                <?php if(isset($danhMucs)): ?>
                                    <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Thương hiệu <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <select class="form-control" name="ThuongHieuId">
                                <option value="">-- Thương hiệu --</option>
                                <?php if(isset($thuongHieus)): ?>
                                    <?php $__currentLoopData = $thuongHieus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="MoTa" id="ckeditor" rows="5"><?php echo e($sanPhams->MoTa ?? ''); ?></textarea>
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
                                <textarea class="row form-control" rows="10" name="NoiDung" id="NoiDung"><?php echo e($sanPhams->NoiDung ?? ''); ?></textarea>
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

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanpham/sanphamadd.blade.php ENDPATH**/ ?>