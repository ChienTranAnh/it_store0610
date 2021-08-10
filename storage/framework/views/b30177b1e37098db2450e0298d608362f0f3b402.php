<?php $__env->startSection('title', 'Danh sách người dùng'); ?>
<?php $__env->startSection('thanhphan', 'Danh sách người dùng'); ?>

<?php $__env->startSection('nguoidung', 'is-expanded'); ?>
<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Danh sách người dùng</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="form-group">
                <form action="/nguoidung/danhsach">
                    <fieldset>
                        <legend style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px">Tìm nhanh:</legend>
                      <div class="row">
                        <label class="col-md-1"></label>
                        <div class="col-md-4">
                          <input type="text" name="tuKhoa" class="form-control" value="<?php echo e($tuKhoa??''); ?>" placeholder="Tìm theo họ tên / username / email / điện thoại ?">
                        </div>
                        <div class="col-md-3">
                            <select name="tkVaiTro" class="form-control">
                                <option value="">- - - Theo vai trò?</option>
                                <?php $__currentLoopData = $vaiTros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($maVT == $vt->Id): ?>
                                        <option selected="selected" value="<?php echo e($vt->Id); ?>"><?php echo e($vt->VaiTro); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($vt->Id); ?>"><?php echo e($vt->VaiTro); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                        <?php if(session('thongBao')): ?>
                           <div class="col-md-2">
                              <div class="alert alert-success">
                                 <?php echo e(session('thongBao')); ?>

                              </div>
                           </div>
                        <?php endif; ?>
                      </div>
                    </fieldset>
                  </form>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-borderless table-striped">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $nguoiDung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td><?php echo e($index++); ?></td>
                           <td><?php echo e($us->Id); ?></td>
                           <td><?php echo e($us->UserName); ?></td>
                           <td><?php echo e($us->HoTen); ?></td>
                           <td><?php echo e($us->DienThoai); ?></td>
                           <td><?php echo e($us->Email); ?></td>
                           <td><?php echo e($us->DiaChi); ?></td>
                           <form class="form-horizontal" action="/nguoidung/vaitro/<?php echo e($us->Id); ?>" method="POST">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                              <td>
                                 <select class="form-control col-sm-9" name="VaiTroId">
                                       <option value="">- - -</option>
                                       <?php $__currentLoopData = $vaiTros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($us->VaiTroId == $vt->Id): ?>
                                             <option selected="selected" value="<?php echo e($vt->Id); ?>"><?php echo e($vt->VaiTro); ?></option>
                                          <?php else: ?>
                                             <option value="<?php echo e($vt->Id); ?>"><?php echo e($vt->VaiTro); ?></option>
                                          <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </td>
                              <td class="text-center">
                                 
                                 <a class="btn" href="/nguoidung/sua/<?php echo e($us->Id); ?>" title="Sửa"><i class="fas fa-user-edit" style="color:#146e6f"></i></a>
                                 <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color:black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="/nguoidung/xoa/<?php echo e($us->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                              </td>
                           </form>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php if(session('message')): ?>
                <div class="col-md-6">
                    <div class="alert <?php echo e(session('class')); ?>">
                        <?php echo e(session('message')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/user/danhsach.blade.php ENDPATH**/ ?>