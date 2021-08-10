<?php $__env->startSection('title', 'Danh sách bài viết'); ?>

<?php $__env->startSection('thanhphan', 'Danh sách bài viết'); ?>

<?php $__env->startSection('blog', 'is-expanded'); ?>

<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            
               <div class="form-group" style="text-align: right">
                  <h3 style="float: left">Danh sách bài viết</h3>
                  <div>
                     <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-2"></div>
                     <div class="col-md-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                        <h4>Tìm nhanh:</h4>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-1 text-left">
                        <button type="submit" class="btn btn-info"><i class="fas fa-check-double"> Duyệt</i></button>
                     </div>
                     <div class="col-md-11">
                        <form action="/blog/danhsach">
                           <fieldset>
                              <div class="row">
                                 <label class="col-md-1"></label>
                                 <div class="col-md-4">
                                    <input type="text" name="tuKhoa" class="form-control" value="<?php echo e($tuKhoa??''); ?>" placeholder="Bài viết muốn tìm?">
                                 </div>
                                 <div class="col-md-3">
                                    <select name="tkChuDe" class="form-control">
                                       <option value="">- - - Theo chủ để ?</option>
                                       <?php if(isset($chuDes)): ?>
                                          <?php $__currentLoopData = $chuDes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php if($maCD == $cd->Id): ?>
                                                <option selected="selected" value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                             <?php else: ?>
                                                <option value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                             <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                    </select>
                                 </div>
                                 <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                                 </div>
                                 <?php if(session('thongBao')): ?>
                                    <div class="col-md-3">
                                       <div class="alert <?php echo e(session('class')); ?>">
                                          <?php echo e(session('thongBao')); ?>

                                       </div>
                                    </div>
                                 <?php endif; ?>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="tile-body">
                  <table class="table table-hover table-bordered table-borderless table-striped" id="dynamic-table">
                     <thead class="thead-light text-center">
                     <tr>
                           <th class="text-center">
                              <div class="animated-checkbox">
                                 <label>
                                 <input type="checkbox" id="selectAll"><span class="label-text"></span>
                                 </label>
                              </div>
                           </th>
                           <th>STT</th>
                           <th>Owner</th>
                           <th>Ảnh</th>
                           <th>ID</th>
                           <th style="width: 40%">Tên bài viết</th>
                           <th>Chủ đề</th>
                           <th>Đã duyệt</th>
                           <th>Viewed</th>
                           <th>Tác vụ</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <td class="text-center">
                              <div class="animated-checkbox">
                                 <label>
                                    <input type="checkbox" id="td-checkbox-<?php echo e($bl->Id); ?>"><span class="label-text"></span>
                                 </label>
                              </div>
                           </td>
                           <td><?php echo e($index++); ?></td>
                           <td>
                              <?php if($bloger): ?>
                                 <?php $__currentLoopData = $bloger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($bl->BloggerId == $blg->Id): ?>
                                       <p><?php echo e($blg->UserName); ?></p>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </td>
                           <td><img src="/blogs/<?php echo e($bl->Anh); ?>" width="70" alt="Ảnh bài viết"></td>
                           <td><?php echo e($bl->Id); ?></td>
                           <td><?php echo e($bl->TieuDe); ?>&nbsp;&nbsp;&nbsp;<a style="float:right" href="/blog-detail/<?php echo e($bl->Id); ?>" target="_blank" title="Đường dẫn bài viết"><i style="color: #009688" class="fas fa-link"></i></a></td>
                           <form class="form-horizontal" action="/blog/chitiet/<?php echo e($bl->Id); ?>" method="POST">
                           <td>
                              <select class="form-control" name="ChuDeId">
                                 <option value="">- - - - -</option>
                                    <?php if($chuDes): ?>
                                       <?php $__currentLoopData = $chuDes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($bl->ChuDeId == $cd->Id): ?>
                                             <option selected="selected" value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                          <?php else: ?>
                                             <option value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                          <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                              </select>
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           </td>
                           <td>
                              <?php switch($bl->DaDuyet):
                                    case (1): ?>
                                          <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"><span class="label-text"> Duyệt</span></i>
                                          <?php break; ?>
                                    <?php case (2): ?>
                                          <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"><span class="label-text"> Xem</span></i>
                                          <?php break; ?>
                                    <?php default: ?>
                                          <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"><span class="label-text"> Chưa</span></i>
                                          <?php break; ?>
                                 <?php endswitch; ?>
                              
                           </td>
                           <td class="text-center"><?php echo e($bl->LuotXem); ?></td>
                           <td class="text-center">
                              
                              <a class="btn" href="/blog/chitiet/<?php echo e($bl->Id); ?>" title="Xem"><i class="fas fa-info" style="color: blue"></i></a>
                              <a class="btn" href="/blog/sua/<?php echo e($bl->Id); ?>" title="Sửa"><i class="fas fa-pen" style="color: #146e6f"></i></a>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/blog/xoa/<?php echo e($bl->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                           </td>
                           </form>
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
            
            <?php echo e($blogs->links()); ?>

        </div>
    </div>
</div>

		<!-- inline scripts related to this page -->
      
      
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/blog/danhsach.blade.php ENDPATH**/ ?>