

<?php $__env->startSection('title', 'Danh sách danh mục sản phẩm'); ?>

<?php $__env->startSection('thanhphan', 'Danh sách danh mục sản phẩm'); ?>

<?php $__env->startSection('danhmuc', 'is-expanded'); ?>

<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Danh mục sản phẩm</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã danh mục</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($dm->Id); ?></td>
                        <td><?php echo e($dm->DanhMuc); ?></td>
                        <td><?php echo e($dm->MoTa); ?></td>
                        <td class="text-center">
                            
                            <a class="btn" href="sua/<?php echo e($dm->Id); ?>" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="xoa/<?php echo e($dm->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
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

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/danhmuc/danhsach.blade.php ENDPATH**/ ?>