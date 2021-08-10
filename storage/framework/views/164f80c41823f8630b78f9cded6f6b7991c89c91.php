

<?php $__env->startSection('title', 'Danh sách thương hiệu'); ?>

<?php $__env->startSection('thanhphan', 'Danh sách thương hiệu'); ?>
<?php echo e($index = 1); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group">
                <h3>Danh sách thương hiệu</h3>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-striped" id="danhSachTable">
                    <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã hãng</th>
                        <th>Hãng sản xuất</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>
                            <a href="them-moi"><button class="btn btn-warning"><i class="fa fa-plus"></i>Thêm mới</button></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $hangSXs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index++); ?></td>
                            <td><?php echo e($sx->Id); ?></td>
                            <td><?php echo e($sx->TenHang); ?></td>
                            <td><?php echo e($sx->MoTa); ?></td>
                            <td><?php echo e($sx->NgayTao); ?></td>
                            <td><?php echo e($sx->NgaySua); ?></td>
                            <td>
                                <a href="sua/<?php echo e($sx->Id); ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i>Sửa</button></a>&nbsp;
                                <a href="xoa/<?php echo e($sx->Id); ?>"><button class="btn btn-danger"><i class="fa fa-minus-circle"></i>Xóa</button></a>
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

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/hangsx/danhsach.blade.php ENDPATH**/ ?>