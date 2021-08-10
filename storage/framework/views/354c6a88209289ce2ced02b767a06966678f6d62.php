<?php $__env->startSection('title', 'Danh sách sản phẩm'); ?>
<?php $__env->startSection('thanhphan', 'Danh sách sản phẩm'); ?>

<?php $__env->startSection('sanpham', 'is-expanded'); ?>

<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         
            <div class="form-group" style="text-align: right">
               <h3 style="float: left">Danh sách sản phẩm</h3>
               <div>
                  <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                     <h4>Tìm nhanh:</h4>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-1 text-left">
                     <button type="submit" class="btn btn-info"><i class="fas fa-check-double"> Duyệt</i></button>
                  </div>
                  <div class="col-md-11">
                     <form action="/sanpham/danhsach" method="GET">
                        <fieldset class="row">
                           <div class="col-md-3">
                              
                              <input type="text" name="tuKhoa" class="form-control" value="<?php echo e($tuKhoa??''); ?>" placeholder="Sản phẩm muốn tìm?">
                           </div>
                           <div class="col-md-3">
                              <select name="tkDanhMuc" class="form-control">
                                 
                                 <option value="">- - Theo danh mục sản phẩm?</option>
                                 <?php if(isset($danhMucs)): ?>
                                       <?php $__currentLoopData = $danhMucs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($maDM == $dm->Id): ?>
                                          <option selected="selected" value="<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></option>
                                       <?php else: ?>
                                          <option value="<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></option>
                                       <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                           </div>
                           <div class="col-md-2">
                              <select name="tkThuongHieu" class="form-control">
                                 
                                 <option value="">- - Theo thương hiệu?</option>
                                 <?php if(isset($thuongHieus)): ?>
                                       <?php $__currentLoopData = $thuongHieus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($maTH == $th->Id): ?>
                                          <option selected="selected" value="<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></option>
                                       <?php else: ?>
                                          <option value="<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></option>
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
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
            <div class="tile-body">
               <table class="table table-hover table-bordered table-borderless table-striped">
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
                        <th>Ảnh</th>
                        <th style="width: 28%">Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Đã bán</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Tình trạng</th>
                        <th>Đã duyệt</th>
                        <th>Tác vụ</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $sanPhams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td class="text-center">
                        <div class="animated-checkbox">
                           <label>
                              <input type="checkbox" id="td-checkbox-<?php echo e($sp->Id); ?>"><span class="label-text"></span>
                           </label>
                        </div>
                     </td>
                     <td><?php echo e($index++); ?></td>
                     <td><img src="/images/<?php echo e($sp->AnhSanPham); ?>" width="50" alt="Ảnh sản phẩm"></td>
                     <td><?php echo e($sp->TenSanPham); ?>&nbsp;&nbsp;&nbsp;<a style="float: right" href="/sanphamchitiet/<?php echo e($sp->Id); ?>" target="_blank" title="Đường dẫn sản phẩm"><i style="color: #009688" class="fas fa-link"></i></a></td>
                     <td>
                        <?php echo e(number_format($sp->GiaSanPham)); ?>

                        <?php if($sp->GiaKhuyenMai): ?>
                              &nbsp;<span style="color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                        <?php endif; ?>
                     </td>
                     <td><?php echo e($sp->SoLuong); ?></td>
                     <td><?php echo e($sp->DaBan); ?></td>
                     <td><?php echo e($sp->DanhMucId); ?></td>
                     <td><?php echo e($sp->ThuongHieuId); ?></td>
                     <form class="form-horizontal" action="/sanpham/chitiet/<?php echo e($sp->Id); ?>" method="POST">
                        <td>
                           <select class="form-control" name="TrangThaiId">
                           <option value="">- - - - -</option>
                              <?php if($trangThais): ?>
                                 <?php $__currentLoopData = $trangThais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sp->TrangThaiId == $tt->Id): ?>
                                    <option selected="selected" value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                    <?php else: ?>
                                       <option value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </select>
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           
                        </td>
                        <td>
                        
                           <?php switch($sp->DaDuyet):
                              case (0): ?>
                                    <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa</i>
                                    <?php break; ?>
                              <?php case (1): ?>
                                    <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"> Duyệt</i>
                                    <?php break; ?>
                              <?php case (2): ?>
                                    <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"> Xem</i>
                                    <?php break; ?>
                              <?php default: ?>
                           <?php endswitch; ?>
                        </td>
                        <td class="text-center">
                              
                              <a class="btn" href="/sanpham/chitiet/<?php echo e($sp->Id); ?>" title="Xem"><i class="fas fa-info" style="color: navy"></i></a>
                              <a class="btn" href="/sanpham/sua/<?php echo e($sp->Id); ?>" title="Sửa"><i class="fas fa-pen" style="color: #146e6f"></i></a>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/sanpham/xoa/<?php echo e($sp->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a></br>
                        </td>
                     </form>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
         
         <?php echo e($sanPhams->links()); ?>

      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/sanpham/danhsach.blade.php ENDPATH**/ ?>