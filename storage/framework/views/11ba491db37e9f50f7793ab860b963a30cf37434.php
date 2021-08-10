<?php $__env->startSection('title'); ?>
    Edit - <?php echo e($sanPhams->TenSanPham); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('thanhphan', 'Cập nhật sản phẩm'); ?>
<?php $__env->startSection('sanpham', 'is-expanded'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="/sanpham/sua/<?php echo e($sanPhams->Id); ?>" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Thông tin sản phẩm</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Id:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="Id" value="<?php echo e($sanPhams->Id); ?>" disabled>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Tên sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="TenSanPham" value="<?php echo e($sanPhams->TenSanPham); ?>" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Giá sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="GiaSanPham" value="<?php echo e($sanPhams->GiaSanPham); ?>" placeholder="Nhập giá sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Giá khuyến mại:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="GiaKhuyenMai" value="<?php echo e($sanPhams->GiaKhuyenMai); ?>" placeholder="Nhập giá khuyến mại (nếu có)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Số lượng <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="SoLuong" value="<?php echo e($sanPhams->SoLuong); ?>" placeholder="Nhập số lượng sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Đơn vị:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="DonVi" value="<?php echo e($sanPhams->DonVi); ?>" placeholder="Đơn vị tính">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Danh mục sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="DanhMucId">
                                        <option value="">-- Danh mục sản phẩm --</option>
                                        <?php if(isset($danhMucs)): ?>
                                            <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sanPhams->DanhMucId == $dm->Id): ?>
                                                    <option selected="selected" value="<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Thương hiệu <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="ThuongHieuId">
                                        <option value="">-- Thương hiệu --</option>
                                        <?php if(isset($thuongHieus)): ?>
                                            <?php $__currentLoopData = $thuongHieus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sanPhams->ThuongHieuId == $th->Id): ?>
                                                    <option selected="selected" value="<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-6">
                                    <img src="/images/<?php echo e($sanPhams->AnhSanPham); ?>" width="400" alt="Ảnh <?php echo e($sanPhams->TenSanPham); ?>">
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-2">Tải ảnh khác:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="AnhSP">
                                    <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="MoTa" id="ckeditor" rows="5"><?php echo e($sanPhams->MoTa); ?></textarea>
                            <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
                            <script>
                                CKEDITOR.replace('MoTa',
                                {
                                    width: '100%',
                                    height: 200
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Nội dung <span class="red">*</span> :</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="10" name="NoiDung" id="NoiDung"><?php echo e($sanPhams->NoiDung); ?></textarea>
                            <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
                            <script>
                                CKEDITOR.replace('NoiDung',
                                {
                                    width: '100%',
                                    height: 1000
                                });
                            </script>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <label class="control-label col-md-8"></label>
                        <div class="col-md-3 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
                        </div>
                    </div>
                    <div class="row"><label class="col-md-3"></label></div>
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

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanpham/sanphamedit.blade.php ENDPATH**/ ?>