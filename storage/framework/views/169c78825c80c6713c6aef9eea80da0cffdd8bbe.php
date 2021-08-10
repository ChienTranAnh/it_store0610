
<?php if(session('Cart')): ?>

<div class="modal fade" id="gio_hang" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Giỏ hàng</h5>
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="product-table">

                        <table class="table" id="table-cart">
                            <thead>
                                <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Thành tiền</th>
                                <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                              
                              <?php $__currentLoopData = session('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td class="col-sm-8 col-md-6"><div class="media"> <a class="thumbnail pull-left" href="<?php echo e($item['product']->Id); ?>"> <img style="width: 100px" class="media-object" src="/images/<?php echo e($item['product']->AnhSanPham); ?>" alt="<?php echo e($item['product']->TenSanPham); ?>"></a>
                                      <div class="media-body">
                                          <h4 class="media-heading"><a href="/sanphamchitiet/<?php echo e($item['product']->Id); ?>"><?php echo e($item['product']->TenSanPham); ?></a></h4>
                                          <span>Status: </span><span class="text-success"><?php echo e($item['product']->TrangThaiId); ?></span> </div>
                                      </div>
                                  </td>
                                  <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control" value="<?php echo e($item['quanty']); ?>" type="number"></td>
                                  <td class="col-sm-1 col-md-1 text-center">
                                    <?php if($item['product']->GiaKhuyenMai != 0): ?>
                                        <p class="price_table"><del><?php echo e(number_format($item['product']->GiaSanPham)); ?></del></p>&nbsp;<p class="new_price"><?php echo e(number_format($item['product']->GiaKhuyenMai)); ?></p>
                                    <?php else: ?>
                                        <p class="price_table"><?php echo e(number_format($item['product']->GiaSanPham)); ?></p>
                                    <?php endif; ?>
                                  </td>
                                  <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><b><?php echo e(number_format($item['price'])); ?></b> <i>vnđ</i></p></td>
                                  <td class="col-md-1">
                                      <button class="bt_main" data-id="<?php echo e($item['product']->Id); ?>"><i class="fa fa-trash"></i></button></br>
                                      
                                  </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                </div>
                <div class="shopping-cart-cart">
                  <table class="table">
                    <tbody>
                      <tr class="head-table">
                        <td><h5>Tạm tính</h5></td>
                        <td class="text-right"></td>
                      </tr>
                      <tr>
                        <td><h4>Tổng tiền:</h4></td>
                        <td class="text-right"><h4><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h4></td>
                      </tr>
                      <tr>
                        <td><h5>Phí ship:</h5></td>
                        <td class="text-right"><h4>0</h4></td>
                      </tr>
                      <tr>
                        <td><h4>Thành tiền:</h4></td>
                        <td class="text-right"><h4><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h4></td>
                      </tr>
                      <tr>
                        <td><button type="button" class="button" data-dismiss="modal">Sắm tiếp</button></td>
                        <td><a href="/giohang"><button class="button">Giỏ hàng</button></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
        <script>
          $('#table-cart').on("click", ".bt_main", function(){
              $.ajax({
                url: '/del-from-cart/'+$(this).data("id"),
                type: 'GET',
              }).done(function(response){
                console.log(response);
                $("#change-item-cart").empty();
                $("#table-cart").empty();
                $("#change-item-cart").html(response);
                $("#table-cart").html(response);
                $("#total-quanty-show").text($("#total-quanty").val());
                alertify.success('Xóa giỏ hàng thành công!');
              });
          });
        </script>
      </div>
  </div>
</div>



          <div class="product-table" id="change-item-cart">
                <table class="table">
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
                                
                                <i class="fas fa-times" data-id=<?php echo e($item['product']['Id']); ?>></i>
                              </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td>total: <?php echo e(session('Cart')->totalQuanty); ?></td>
                              <td> => </td>
                              <td><h5><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h5></td>
                          </tr>
                    </tbody>
                    <input type="hidden" id="total-quanty" value="<?php echo e(session('Cart')->totalQuanty); ?>">
                </table>
          </div>

<?php endif; ?>
        

<?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/gioHang.blade.php ENDPATH**/ ?>