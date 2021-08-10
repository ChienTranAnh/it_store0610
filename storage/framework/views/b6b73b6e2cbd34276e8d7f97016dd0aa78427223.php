

<?php $__env->startSection('title', 'Slide'); ?>
<?php $__env->startSection('thanhphan', 'Slide'); ?>

<?php $__env->startSection('slide', 'is-expanded'); ?>
<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="form-group" style="text-align: right">
            <h3 style="float: left">Slide</h3>
            <div>
               <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
            </div>
         </div>
         <div class="tile-body table-responsive table--no-card m-b-40">
            <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
               <thead class="thead-light text-center">
                  <tr>
                     <th>STT</th>
                     <th>Id</th>
                     <th>Ảnh</th>
                     <th>Tiêu đề</th>
                     <th>Filename</th>
                     <th>Chọn ảnh</th>
                     <th>Tác vụ</th>
                  </tr>
               </thead>
               <tbody>
               <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td><?php echo e($index++); ?></td>
                     <td><?php echo e($sl->Id); ?></td>
                     <td><img src="/slide/<?php echo e($sl->Anh); ?>" alt="<?php echo e($sl->Anh); ?>" width="250"></td>
                     <td><?php echo e($sl->TieuDe); ?></td>
                     <td><?php echo e($sl->Anh); ?></td>
                     <form class="form-horizontal" action="/slide/chonanh/<?php echo e($sl->Id); ?>" method="POST">
                        <td>
                           <?php switch($sl->AnhChon):
                              case (0): ?>
                                 <div class="animated-radio-button">
                                    <label>
                                       <input type="radio" id="0" name="AnhChon" value="0" checked><span class="label-text"> Chưa duyệt</span>
                                    </label></br>
                                    <label>
                                       <input type="radio" id="1" name="AnhChon" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                    </label>
                                 </div>
                                 <?php break; ?>
                              <?php case (1): ?>
                                 <div class="animated-radio-button">
                                    <label>
                                       <input type="radio" id="0" name="AnhChon" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                    </label></br>
                                    <label>
                                       <input type="radio" id="1" name="AnhChon" value="1" checked><span class="label-text"> Duyệt</span>
                                    </label>
                                 </div>
                                 <?php break; ?>
                              <?php default: ?>
                           <?php endswitch; ?>
                        </td>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <td class="text-center">
                           
                           <a class="btn" href="sua/<?php echo e($sl->Id); ?>" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>
                           <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="xoa/<?php echo e($sl->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a></br>
                        </td>
                     </form>
                  </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/slide/danhsach.blade.php ENDPATH**/ ?>