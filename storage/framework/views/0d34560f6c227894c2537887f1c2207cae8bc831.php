<?php if(Session::has('Cart')): ?>
   <table class="table" id="change-item-cart">
      <tbody>
         <?php $__currentLoopData = session('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td class="col-md-2"><img src="/images/<?php echo e($item['product']['AnhSanPham']); ?>" width="50" alt=""></td>
            <td class="col-md-6">
               <div class="product-selected">
                  <?php if($item['product']->GiaKhuyenMai != 0): ?>
                     <p><del><?php echo e(number_format($item['product']['GiaSanPham'])); ?></del></p>&nbsp;
                     <p><?php echo e(number_format($item['product']['GiaKhuyenMai'])); ?> x <?php echo e($item['quanty']); ?></p>
                  <?php else: ?>
                     <p><?php echo e(number_format($item['product']['GiaSanPham'])); ?> x <?php echo e($item['quanty']); ?></p>
                  <?php endif; ?>
                     <h6><?php echo e($item['product']['TenSanPham']); ?></h6>
               </div>
            </td>
            <td><p><b><?php echo e(number_format($item['price'])); ?></b> <i>vnđ</i></p></td>
            <td class="col-md-1">
               <i class="close fas fa-times" data-id=<?php echo e($item['product']['Id']); ?>></i>
            </td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td>total: <?php echo e(session('Cart')->totalQuanty); ?></td>
            <input type="hidden" id="total-quanty" value="<?php echo e(session('Cart')->totalQuanty); ?>">
            <td> => </td>
            <td><h5><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h5></td>
         </tr>
      </tbody>
   </table>
   <?php else: ?>
   <div class="row form-group">
      <h5>Bạn chưa quyết định chọn sản phẩm nào!</h5>
      <p>=></p>
      <h5>0 <i>vnđ</i></h5>
   </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/cart/cart_cache.blade.php ENDPATH**/ ?>