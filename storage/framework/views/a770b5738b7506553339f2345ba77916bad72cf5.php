<?php $__env->startSection('title'); ?>
  View <?php echo e($blogs->TieuDe); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('thanhphan', 'Duyệt sản phẩm'); ?>
<?php $__env->startSection('blog', 'is-expanded'); ?>
<?php $__env->startSection('blog_detail', 'active'); ?>

<?php $index = 1; ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="invoice">
            <div class="row mb-4">
               <div class="col-8">
                  <h2 class="page-header"><i class="far fa-newspaper"></i> <?php echo e($blogs->TieuDe); ?></h2>
               </div>
               <div class="col-4">
                  <h5 class="text-right"><i class="far fa-user"></i>
                     <?php $__currentLoopData = $bloger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($blogs->BloggerId == $blg->Id): ?>
                           <?php echo e($blg->UserName); ?>

                        <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </h5>
               </div>
            </div>
            <div class="row invoice-info">
               <div class="col-4">
                  <img src="/blogs/<?php echo e($blogs->Anh); ?>" width="400" alt="Ảnh <?php echo e($blogs->TieuDe); ?>">
               </div>
               <div class="col-2"></div>
               <div class="col-5">
                  <div class="card-body">
                     <form class="form-horizontal" action="/blog/chitiet/<?php echo e($blogs->Id); ?>" method="POST">
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <table class="table">
                        <thead>
                           <tr>
                           <th>Chủ đề</th>
                           <th>Tình trạng</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="col-md-8">
                                 <select class="form-control" name="ChuDeId">
                                    <option value="">- - - - -</option>
                                       <?php if($chuDes): ?>
                                       <?php $__currentLoopData = $chuDes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php if($blogs->ChuDeId == $cd->Id): ?>
                                             <option selected="selected" value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                             <?php else: ?>
                                             <option value="<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></option>
                                             <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                 </select>
                                 </div>
                              </td>
                              <td>
                                 <div class="col-md-8">
                                 <?php switch($blogs->DaDuyet):
                                       case (0): ?>
                                          <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa duyệt</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                          </div>
                                          <?php break; ?>
                                       <?php case (1): ?>
                                          <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"> Đã duyệt</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                          </div>
                                          <?php break; ?>
                                       <?php case (2): ?>
                                          <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"> Đang xem</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text">Đang xem</span></label>
                                          </div>
                                          <?php break; ?>
                                       <?php default: ?>
                                 <?php endswitch; ?>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" style="text-align: right">
                                 <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Done</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/blog/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </form>
                     <div class="row">
                        <?php if(Session('thongBao')): ?>
                           <div class="alert <?php echo e(session('class')); ?>" role="alert">
                              <?php echo e(Session('thongBao')); ?>

                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12 table-responsive">
                  <table class="table table-striped">
                     <thead>
                     <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Chủ đề</th>
                        <th>Lượt xem</th>
                        <th>Ngày viết</th>
                        <th>Người viết</th>
                        <th>Ngày sửa</th>
                        <th>Ngày duyệt</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($blogs->Id); ?></td>
                        <td><?php echo e($blogs->TieuDe); ?></td>
                        <td><?php echo e($blogs->ChuDeId); ?></td>
                        <td><?php echo e($blogs->LuotXem); ?></td>
                        <td><?php echo e($blogs->NgayTao); ?></td>
                        <td>
                           <?php $__currentLoopData = $bloger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($blogs->BloggerId == $blg->Id): ?>
                                    <?php echo e($blg->UserName); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($blogs->NgaySua); ?></td>
                        <td><?php echo e($blogs->NgayDuyet); ?></td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row"><label for=""></label></div>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                  <?php echo $blogs->MoTa; ?>

               </div>
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-8">
                  <?php echo $blogs->NoiDung; ?>

               </div>
            </div>
            <div class="row">
               <label class="control-label col-md-10"></label>
                  <div class="col-md-2 col-md-offset-3">
                     <a href="/blog/sua/<?php echo e($blogs->Id); ?>"><button class="btn btn-primary" type="submit" href="" target="_blank"><i class="fas fa-edit"></i>Sửa</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/blog/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/blog/bloginfo.blade.php ENDPATH**/ ?>