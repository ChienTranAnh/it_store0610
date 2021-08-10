

<?php $__env->startSection('title', 'Sản phẩm'); ?>
<?php $__env->startSection('breadcrumb', 'Sản phẩm'); ?>
<?php $__env->startSection('sanpham', 'active'); ?>
<?php $__env->startSection('body', 'it_shop_list'); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- section -->
<div class="section padding_layout_1 product_list_main">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">Hiển thị <?php echo e(count($sanPham)); ?> sản phẩm/ trang</div>
        <div class="row"><label class="col-md-12"></label></div>
        <div class="row">
          <?php $__currentLoopData = $sanPham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
              <div class="product_list">
                <?php if($sp->GiaKhuyenMai != 0): ?>
                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                <?php elseif($sp->TrangThaiId == 2): ?>
                    <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                <?php elseif($sp->TrangThaiId == 3): ?>
                    <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                <?php endif; ?>
                <div class="product_img"> <img class="img-responsive" src="/images/<?php echo e($sp->AnhSanPham); ?>" alt="<?php echo e($sp->TenSanPham); ?>"> </div>
                <div class="product_detail_btm">
                  <div class="center">
                    <h4><a href="/sanphamchitiet/<?php echo e($sp->Id); ?>"><?php echo e($sp->TenSanPham); ?></a></h4>
                  </div>
                  <div class="starratin">
                    <div class="center"> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="far fa-star" aria-hidden="true"></i> </div>
                  </div>
                  <div class="product_price col-md-12">
                    <?php if($sp->GiaKhuyenMai > 0): ?>
                      <p><span class="old_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($sp->GiaSanPham)); ?> <i>vnđ</i></span></br><span class="new_price"><i class="fas fa-dollar"></i> <?php echo e(number_format($sp->GiaKhuyenMai)); ?> <i>vnđ</i></span></p>
                    <?php else: ?>
                      <p><span class="new_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($sp->GiaSanPham)); ?> <i>vnđ</i></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row"><?php echo e($sanPham->links()); ?></div>
      </div>
      <div class="col-md-3">
        <?php if ($__env->exists('layouts.rightbarProduct')) echo $__env->make('layouts.rightbarProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_shop.blade.php ENDPATH**/ ?>