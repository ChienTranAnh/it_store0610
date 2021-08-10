<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('thanhphan', 'Dashboard'); ?>
<?php $__env->startSection('dashboard', 'active'); ?>

<?php $__env->startSection('content'); ?>
   <div class="row">
      <div class="col-md-3">
      <div class="widget-small success"><i class="icon fas fa-users fa-3x"></i>
         <div class="info">
         <h4>Khách hàng</h4>
         <p><b><?php echo e(count($khachHang)); ?></b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      
      <div class="widget-small info"><i class="icon fas fa-shopping-cart fa-3x"></i>
         <div class="info">
         <h4>Đơn hàng</h4>
         <p><b><?php echo e(count($donHang)); ?></b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      <div class="widget-small warning"><i class="icon fa fa-chart-pie fa-3x"></i>
         <div class="info">
         <h4>Sản phẩm</h4>
         <p><b><?php echo e(count($sanPham)); ?></b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      <div class="widget-small danger"><i class="icon fas fa-pen-nib fa-3x"></i>
         <div class="info">
         <h4>Bài viết</h4>
         <p><b><?php echo e(count($blog)); ?></b></p>
         </div>
      </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Đơn hàng</h3>
               <button class="btn btn-info" onclick="window.open('<?php echo e(url('/donhang/danhsach')); ?>','_self')"><i class="fas fa-book"></i>Danh sách</button>
            </div>
            <div class="table-responsive table--no-card m-b-30">
               <table class="table table-borderless table-striped table-earning">
                  <thead class="thead-light"><?php $soDH=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>customers</th>
                        <th>payment</th>
                        <th>notes</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $donHang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($soDH++); ?></td>
                        <td>
                           <?php $__currentLoopData = $khachHang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($dh->KhachHangId == $kh->Id): ?>
                                    <?php echo e($kh->HoTen); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($dh->HinhThucThanhToan); ?></td>
                        <td><?php echo e($dh->GhiChu); ?></td>
                        <td class="text-right"><?php echo e($dh->SoLuong); ?></td>
                        <td class="text-right">$<?php echo e(number_format($dh->TongTien)); ?></td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Khách hàng</h3>
               <button class="btn btn-success" onclick="window.open('<?php echo e(url('/khachhang/danhsach')); ?>','_self')"><i class="fas fa-people-arrows"></i>Danh sách</button>
            </div>
         <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
               <thead class="thead-light"><?php $soKH=1; ?>
                  <tr>
                     <th>STT</th>
                     <th>name</th>
                     <th>phone</th>
                     <th>sex</th>
                     <th>email</th>
                     <th>username</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $__currentLoopData = $khachHang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td><?php echo e($soKH++); ?></td>
                     <td><?php echo e($kh->HoTen); ?></td>
                     <td><?php echo e($kh->DienThoai); ?></td>
                     <td>
                        <?php switch($kh->GioiTinh):
                           case ("Nam"): ?>
                              <i class="fas fa-mars" style="color: #009688" title="Male"></i>
                              <?php break; ?>
                           <?php case ("Nữ"): ?>
                              <i class="fas fa-venus" style="color: red" title="Female"></i>
                              <?php break; ?>
                           <?php case ("Khác"): ?>
                           <i class="fas fa-ellipsis-h" style="color: blueviolet" title="Other"></i>
                              <?php break; ?>
                           <?php default: ?>
                              <i class="fas fa-question" title="Hum?"></i>
                        <?php endswitch; ?>
                     </td>
                     <td><?php echo e($kh->Email); ?></td>
                     <td><?php echo e($kh->UserName); ?></td>
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
               <h3 style="float: left" class="tile-title">Sản phẩm</h3>
               <button class="btn btn-warning" onclick="window.open('<?php echo e(url('/sanpham/danhsach')); ?>','_self')"><i class="fas fa-laptop"></i>Danh sách</button>
            </div>
            <div class="table-responsive m-b-40">
               <table class="table table-borderless table-striped table-data3">
                  <thead class="thead-dark"><?php $soSP=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>Id</th>
                        <th>picture</th>
                        <th>products</th>
                        <th>product_type</th>
                        <th>trademark</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">price</th>
                        <th class="text-right">pro_price</th>
                        <th class="text-right">checked</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $sanPham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($soSP++); ?></td>
                        <td><?php echo e($sp->Id); ?></td>
                        <td><img src="/images/<?php echo e($sp->AnhSanPham); ?>" width="40" alt="Ảnh sản phẩm"></td>
                        <td>
                           <?php echo e($sp->TenSanPham); ?>

                           <?php if($sp->GiaKhuyenMai): ?>
                                 &nbsp;<span style="color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                           <?php endif; ?>
                        </td>
                        <td>
                           <?php $__currentLoopData = $danhMuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($sp->DanhMucId == $dm->Id): ?>
                                    <?php echo e($dm->DanhMuc); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                           <?php $__currentLoopData = $thuongHieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($sp->ThuongHieuId == $th->Id): ?>
                                    <?php echo e($th->ThuongHieu); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="text-right"><?php echo e($sp->SoLuong); ?></td>
                        <td class="text-right">$<?php echo e(number_format($sp->GiaSanPham)); ?></td>
                        <td class="text-right">
                           <?php if($sp->GiaKhuyenMai > 0): ?>
                              $<?php echo e(number_format($sp->GiaKhuyenMai)); ?>

                           <?php else: ?>
                           <?php endif; ?>
                        </td>
                        <td class="text-center">
                           <?php switch($sp->DaDuyet):
                              case (1): ?>
                                 <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i>
                                 <?php break; ?>
                              <?php case (2): ?>
                                 <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i>
                                 <?php break; ?>
                              <?php default: ?>
                                 <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i>
                           <?php endswitch; ?>
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
               <h3 style="float: left" class="tile-title">Bài viết</h3>
               <button class="btn btn-danger" onclick="window.open('<?php echo e(url('/blog/danhsach')); ?>','_self')"><i class="fas fa-newspaper"></i>Danh sách</button>
            </div>
            <div class="table-responsive m-b-40">
               <table class="table table-borderless table-striped table-data3">
                  <thead class="thead-dark"><?php $soBV=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>Id</th>
                        <th>picture</th>
                        <th>title</th>
                        <th>topic</th>
                        <th>owner</th>
                        <th>checked</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($soBV++); ?></td>
                        <td><?php echo e($bl->Id); ?></td>
                        <td><img src="/blogs/<?php echo e($bl->Anh); ?>" width="40" alt="Ảnh bài viết"></td>
                        <td><?php echo e($bl->TieuDe); ?></td>
                        <td>
                           <?php $__currentLoopData = $chuDe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($bl->ChuDeId == $cd->Id): ?>
                                    <?php echo e($cd->TenChuDe); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                           <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($bl->BloggerId == $us->Id): ?>
                                    <?php echo e($us->UserName); ?>

                                 <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="text-center">
                           <?php switch($bl->DaDuyet):
                           case (1): ?>
                              <i class="fas fa-check" style="color: seagreen" title="Duyệt"></i>
                              <?php break; ?>
                           <?php case (2): ?>
                              <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i>
                              <?php break; ?>
                           <?php default: ?>
                              <i class="fas fa-times" style="color: red" title="Chưa duyệt"></i>
                        <?php endswitch; ?>
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
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo e(asset('js/plugins/pace.min.js')); ?>"></script>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/dashboard.blade.php ENDPATH**/ ?>