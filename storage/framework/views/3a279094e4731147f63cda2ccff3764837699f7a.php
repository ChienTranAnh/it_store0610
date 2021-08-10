

<?php $__env->startSection('title', 'Danh sách vai trò'); ?>
<?php $__env->startSection('thanhphan', 'Danh sách vai trò'); ?>

<?php $__env->startSection('vaitro', 'is-expanded'); ?>
<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Phân quyền</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Vai trò</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $vaiTros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($vt->Id); ?></td>
                        <td><?php echo e($vt->VaiTro); ?></td>
                        <td><?php echo e($vt->MoTa); ?></td>
                        <td>
                            <a class="btn" href="sua/<?php echo e($vt->Id); ?>" title="Sửa"><i class="fas fa-pencil-alt" style="color:#146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <a href="xoa/<?php echo e($vt->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color:red"></i></a>
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
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/vaitro/danhsach.blade.php ENDPATH**/ ?>