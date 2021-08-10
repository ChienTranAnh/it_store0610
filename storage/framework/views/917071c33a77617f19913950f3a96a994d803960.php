

<?php $__env->startSection('title', 'Danh sách danh mục sản phẩm'); ?>

<?php $__env->startSection('thanhphan', 'Danh sách danh mục sản phẩm'); ?>
<?php echo e($index = 1); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã danh mục</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>
                            <a href="them-moi"><button class="btn btn-warning"><i class="fa fa-plus"></i>Thêm mới</button></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index++); ?></td>
                            <td><?php echo e($dm->Id); ?></td>
                            <td><?php echo e($dm->TenDanhMuc); ?></td>
                            <td><?php echo e($dm->MoTa); ?></td>
                            <td><?php echo e($dm->NgayTao); ?></td>
                            <td><?php echo e($dm->NgaySua); ?></td>
                            <td>
                                <a href="sua/<?php echo e($dm->Id); ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i>Sửa</button></a>&nbsp;
                                <a href="xoa/<?php echo e($dm->Id); ?>"><button class="btn btn-danger"><i class="fa fa-minus-circle"></i>Xóa</button></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanphamdanhmuc/danhsach.blade.php ENDPATH**/ ?>