

<?php $__env->startSection('title', 'Danh sách trạng thái'); ?>
<?php $__env->startSection('thanhphan', 'Danh sách trạng thái các loại'); ?>

<?php $__env->startSection('trangthai', 'is-expanded'); ?>
<?php $__env->startSection('ttdanhsach', 'active'); ?>
<?php $index = 1;?>
<?php $indexx = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Trạng thái sản phẩm</h3>
                <div>
                    <a href="/trangthai/them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Trạng thái</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $trangThais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($tt->Id); ?></td>
                        <td><?php echo e($tt->TrangThai); ?></td>
                        <td><?php echo e($tt->MoTa); ?></td>
                        <td class="text-center">
                            <a class="btn" href="/trangthai/sua/<?php echo e($tt->Id); ?>" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/trangthai/xoa/<?php echo e($tt->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Tình trạng đơn hàng</h3>
                <div>
                    <a href="/tinhtrang/them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTableTT">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tình trạng</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tinhTrangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($indexx++); ?></td>
                        <td><?php echo e($tts->Id); ?></td>
                        <td><?php echo e($tts->TrangThai); ?></td>
                        <td><?php echo e($tts->MoTa); ?></td>
                        <td class="text-center">
                            <a class="btn" href="/tinhtrang/sua/<?php echo e($tts->Id); ?>" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/tinhtrang/xoa/<?php echo e($tts->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function del() {
      opt = confirm("Bạn muốn xóa trạng thái này không?\nMuốn lắm -> Ok\nBạn suy nghĩ lại hoặc ấn nhầm - > Hủy");
      if (!opt){
          return;
      }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/trangthai/danhsach.blade.php ENDPATH**/ ?>