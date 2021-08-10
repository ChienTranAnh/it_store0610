<div class="product-table table-responsive" id="list-cart">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th class="text-center">Thành tiền</th>
                <th class="text-center">Sửa</th>
                <th class="text-center">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php if(Session::has('Cart')): ?>
        <?php $__currentLoopData = session('Cart')->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="col-sm-8 col-md-6"><div class="media"> <a class="thumbnail pull-left" href="/sanphamchitiet/<?php echo e($item['product']->Id); ?>"> <img style="width: 130px" class="media-object" src="/images/<?php echo e($item['product']->AnhSanPham); ?>" alt="<?php echo e($item['product']->TenSanPham); ?>"></a>
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
                    <button class="bt_save"><i class="fas fa-save"></i></button>
                </td>
                <td class="col-md-1">
                    <button class="bt_main" onclick="del_list_cart(<?php echo e($item['product']->Id); ?>)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center"><h5>Bạn chưa sẵn sàng tiêu tiền!</h5></td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr class="cart-form">
                <td class="actions">
                    <div class="coupon">
                        <input name="coupon_code" class="input-text" id="coupon_code" placeholder="Coupon code" type="text">
                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                    </div>
                    <input class="button" name="update_cart" value="Update cart" disabled="" type="submit">
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="shopping-cart-cart">
    <table>
        <tbody>
        <?php if(Session::has('Cart')): ?>
            <tr class="head-table">
                <td><h4 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h4></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td><h4>Số sản phẩm:</h4></td>
                <td class="text-right"><h4><?php echo e(session('Cart')->totalQuanty); ?></h4></td>
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
                <?php if(session('Cart')->totalPrice > 0): ?>
                <tr>
                    <td><button type="button" class="button" data-dismiss="modal">Sắm tiếp</button></td>
                    <td><a href="/checkout"><button class="button">Đặt hàng</button></a></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td><button type="button" class="button" data-dismiss="modal">Quay lại sắm đồ</button></td>
                </tr>
                <?php endif; ?>
        <?php else: ?>
            <tr class="head-table">
                <td><h4 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h4></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td><h4>Số sản phẩm:</h4></td>
                <td class="text-right"><h4>0</h4></td>
            </tr>
            <tr>
                <td><h4>Tổng tiền:</h4></td>
                <td class="text-right"><h4>0 <i>vnđ</i></h4></td>
            </tr>
            <tr>
                <td><h5>Phí ship:</h5></td>
                <td class="text-right"><h4>0</h4></td>
            </tr>
            <tr>
                <td><h4>Thành tiền:</h4></td>
                <td class="text-right"><h4>0 <i>vnđ</i></h4></td>
            </tr>
            <tr>
                <td><button type="button" class="button" data-dismiss="modal">Sắm tiếp</button></td>
                <td><a href="/checkout"><button class="button">Thánh toán</button></a></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/cart/list_cart.blade.php ENDPATH**/ ?>