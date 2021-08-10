<?php $__env->startSection('title'); ?>
  View <?php echo e($sanPhams->TenSanPham); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('thanhphan', 'Duyệt sản phẩm'); ?>
<?php $__env->startSection('sanpham', 'is-expanded'); ?>
<?php $__env->startSection('chitietsanpham', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="invoice">
            <div class="row mb-4">
               <div class="col-8">
                  <h2 class="page-header"><i class="fa fa-globe"></i> <?php echo e($sanPhams->TenSanPham); ?>

                     <?php if($sanPhams->GiaKhuyenMai): ?>
                     &nbsp;<span style="font-size:16px;color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                     <?php endif; ?>
                  </h2>
               </div>
               <div class="col-4">
                  <h5 class="text-right"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($sanPhams->GiaSanPham)); ?> vnđ</h5>
               </div>
            </div>
            <div class="row invoice-info">
               <div class="col-4">
                  <img src="/images/<?php echo e($sanPhams->AnhSanPham); ?>" width="400" alt="Ảnh <?php echo e($sanPhams->TenSanPham); ?>">
               </div>
               <div class="col-2"></div>
               <div class="col-5">
                  <div class="card-body">
                     <form class="form-horizontal" action="/sanpham/chitiet/<?php echo e($sanPhams->Id); ?>" method="POST">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Tình trạng sản phẩm</th>
                                 <th>Tình trạng</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="col-md-8">
                                       <select class="form-control" name="TrangThaiId">
                                          <option value="">- - - - -</option>
                                          <?php if($trangThais): ?>
                                             <?php $__currentLoopData = $trangThais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sanPhams->TrangThaiId == $tt->Id): ?>
                                                   <option selected="selected" value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                                <?php else: ?>
                                                   <option value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                                <?php endif; ?>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                       </select>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="col-md-8">
                                       <?php switch($sanPhams->DaDuyet):
                                          case (1): ?>
                                             <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"> Đã duyệt</i></br></br>
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
                                             <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa duyệt</i></br></br>
                                             <div class="animated-radio-button">
                                                <label><input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text">Chưa duyệt</span></label></br>
                                                <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                                <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                             </div>
                                       <?php endswitch; ?>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: right">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Done</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </form>
                     <div class="row">
                        <?php if(Session('thongBao')): ?>
                           <div class="alert alert-success" role="alert">
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
                              <th>Id</th>
                              <th>Sản phẩm</th>
                              <th>Giá k/mại</th>
                              <th>Số lượng</th>
                              <th>Đã bán</th>
                              <th>Đơn vị</th>
                              <th>Danh mục</th>
                              <th>Thương hiệu</th>
                              <th>Ngày tạo</th>
                              <th>Ngày sửa</th>
                              <th>Ngày duyệt</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><?php echo e($sanPhams->Id); ?></td>
                              <td><?php echo e($sanPhams->TenSanPham); ?></td>
                              <td><?php echo e(number_format($sanPhams->GiaKhuyenMai)); ?></td>
                              <td><?php echo e($sanPhams->SoLuong); ?></td>
                              <td><?php echo e($sanPhams->DaBan); ?></td>
                              <td><?php echo e($sanPhams->DonVi); ?></td>
                              <td>
                                 <?php if($danhMucs): ?>
                                    <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($sanPhams->DanhMucId == $dm->Id): ?>
                                       <span><?php echo e($dm->DanhMuc); ?></span>
                                       <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </td>
                              <td>
                                 <?php if($thuongHieus): ?>
                                    <?php $__currentLoopData = $thuongHieus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($sanPhams->ThuongHieuId == $th->Id): ?>
                                       <span><?php echo e($th->ThuongHieu); ?></span>
                                       <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </td>
                              <td><?php echo e($sanPhams->NgayTao); ?></td>
                              <td><?php echo e($sanPhams->NgaySua); ?></td>
                              <td><?php echo e($sanPhams->NgayDuyet); ?></td>
                           </tr>
                        </tbody>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8"><?php echo $sanPhams->MoTa; ?></div>
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-8"><?php echo $sanPhams->NoiDung; ?></div>
            </div>
            <div class="row">
               <label class="control-label col-md-10"></label>
               <div class="col-md-2 col-md-offset-3">
                  <a href="/sanpham/sua/<?php echo e($sanPhams->Id); ?>"><button class="btn btn-primary" type="submit" href="" target="_blank"><i class="fas fa-edit"></i>Sửa</button></a>&nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-backward"></i>Trở về</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanpham/sanphaminfo.blade.php ENDPATH**/ ?>