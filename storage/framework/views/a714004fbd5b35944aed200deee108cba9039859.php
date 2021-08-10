

<?php $__env->startSection('cart', 'active'); ?>
<?php $__env->startSection('title', 'Đặt hàng'); ?>
<?php $__env->startSection('breadcrumb', 'Đặt hàng'); ?>
<?php $__env->startSection('body', 'it_serv_shopping_cart it_checkout checkout_page'); ?>

<?php $__env->startSection('content'); ?>
   <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="section padding_layout_1 checkout_section">
      <div class="container">
         
            
               <div class="col-md-12">
                  <div class="alert <?php echo e($class??''); ?>" role="alert">
                     <?php echo e($thongBao??''); ?>

                  </div>
               </div>
            
         
         <?php if(session('thanhVien')): ?>
         <?php else: ?>
         <div class="row">
            <div class="col-sm-12">
               <div class="full">
                  <div class="tab-info login-section">
                     <p>Bạn đã từng ủng hộ chúng tôi? <a href="#login" class="" data-toggle="collapse">Hãy kiểm tra</a></p>
                  </div>
                  <div id="login" class="collapse">
                     <div class="login-form-checkout">
                        <p>Bạn đã từng ủng hộ cửa hàng chúng tôi, hãy nhập email.</p>
                        <form action="/client-login" method="POST">
                           <fieldset>
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="username">Email <span class="required">*</span></label>
                                    <input class="input-text" name="Email" id="username" required="" type="email">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="password">Mật khẩu</label>
                                    <input class="input-text" name="MatKhau" id="password" type="password">
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                    <button class="bt_main">Check</button>
                                    <span class="remeber"><input type="checkbox">Remember me</span>
                                 </div>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         <?php endif; ?>

         <div class="row">
            <div class="col-md-8">
               <div class="checkout-form">
                  <form action="/get-order" method="POST">
                     <fieldset>
                        <legend>Thông tin của bạn</legend>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Id</label>
                                 <input name="Id" type="text" placeholder="Không bắt buộc">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                              </div>
                           </div>
                           <?php if(session('thanhVien')): ?>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Họ tên <span class="red">*</span></label>
                                 <input name="HoTen" type="text" value="<?php echo e(session('thanhVien')->HoTen ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Giới tính</label>
                                 <select name="GioiTinh" id="">
                                    <?php if(session('thanhVien')->GioiTinh != null): ?>
                                    <option value="<?php echo e(session('thanhVien')->GioiTinh); ?>"><?php echo e(session('thanhVien')->GioiTinh); ?></option>
                                    <?php else: ?>
                                    <option value="">- - -</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                    <?php endif; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Số điện thoại <span class="red">*</span></label>
                                 <input name="DienThoai" type="text" value="<?php echo e(session('thanhVien')->DienThoai ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Email <span class="red">*</span></label>
                                 <input name="Email" type="email" value="<?php echo e(session('thanhVien')->Email ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-field">
                                 <label>Địa chỉ giao hàng <span class="red">*</span></label>
                                 <textarea name="DiaChi" ><?php echo e(session('thanhVien')->DiaChi ?? ''); ?></textarea>
                              </div>
                           </div>
                           <?php else: ?>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Họ tên <span class="red">*</span></label>
                                 <input name="HoTen" type="text" value="<?php echo e($new_cus->HoTen ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Giới tính <span class="red">*</span></label>
                                 <select name="GioiTinh" id="">
                                    <option value="">- - -</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Số điện thoại <span class="red">*</span></label>
                                 <input name="DienThoai" type="text" value="<?php echo e($new_cus->DienThoai ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-field">
                                 <label>Email <span class="red">*</span></label>
                                 <input name="Email" type="email" value="<?php echo e($new_cus->Email ?? ''); ?>" >
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-field">
                                 <label>Địa chỉ giao hàng <span class="red">*</span></label>
                                 <textarea name="DiaChi" ><?php echo e($new_cus->DiaChi ?? ''); ?></textarea>
                              </div>
                           </div>
                           <?php endif; ?>
                           <div class="col-md-12">
                              <div class="form-field">
                                 <label>Ghi chú</label>
                                 <textarea name="GhiChu" rows="2"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-field">
                                 <label>Hình thức thanh toán</label>
                                 <select name="HinhThucThanhToan">
                                    <option value="Chuyển khoản">Chuyển khoản</option>
                                    <option value="COD">COD</option>
                                    <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <button style="float: right" type="submit" class="bt_main"><i class="fas fa-check-circle"></i> Đặt hàng</button>
                           </div>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
            <div class="col-md-4">
               <div class="shopping-cart-cart">
                  <table>
                     <tbody>
                        <?php if(session('Cart')): ?>
                           <tr class="head-table">
                              <td><h5 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h5></td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                               <td><h5>Số sản phẩm:</h5></td>
                               <td class="text-right"><h4><?php echo e(session('Cart')->totalQuanty); ?></h4></td>
                           </tr>
                           <tr>
                              <td><h4>Tổng tiền</h4></td>
                              <td class="text-right"><h4><?php echo e(number_format(session('Cart')->totalPrice)); ?></h4></td>
                           </tr>
                           <tr>
                              <td><h5>Phí vẫn chuyển</h5></td>
                              <td class="text-right"><h4>$ 0</h4></td>
                           </tr>
                           <tr>
                              <td><h3>Thành tiền</h3></td>
                              <td class="text-right"><h4><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h4></td>
                           </tr>
                        <?php else: ?>
                           <tr class="head-table">
                              <td><h5 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h5></td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                               <td><h5>Số sản phẩm:</h5></td>
                               <td class="text-right"><h4>0</h4></td>
                           </tr>
                           <tr>
                              <td><h4>Tổng tiền</h4></td>
                              <td class="text-right"><h4>0</h4></td>
                           </tr>
                           <tr>
                              <td><h5>Phí vẫn chuyển</h5></td>
                              <td class="text-right"><h4>$ 0</h4></td>
                           </tr>
                           <tr>
                              <td><h3>Thành tiền</h3></td>
                              <td class="text-right"><h4>0 <i>vnđ</i></h4></td>
                           </tr>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?php if(Session('message')): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo e(Session('message')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-12">
                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($err); ?></br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
         </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_checkout.blade.php ENDPATH**/ ?>