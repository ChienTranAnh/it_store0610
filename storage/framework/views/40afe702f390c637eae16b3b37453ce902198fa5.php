<!-- header top -->
<div class="header_top">
  <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="full">
               <div class="topbar-left">
                  <ul class="list-inline">
                     <li> <span class="topbar-label"><i class="fa fa-home"></i></span> <span class="topbar-hightlight">Tầng 2 số 20 cuối ngõ 100 Nguyễn Chí Thanh, Đống Đa, Hà Nội</span> </li>
                     <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:tachienn@gmail.com">tachienn@gmail.com</a></span> </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="row col-md-4 right_section_header_top">
            <div class="float-left">
               <div class="social_icon">
                  <ul class="list-inline">
                     <?php if(session('thanhVien')): ?>
                     {
                        <li><a class="fab fa-facebook-f" href="https://www.facebook.com/chien.toet" title="Facebook" target="_blank"></a></li>
                        <li><a class="fab fa-google-plus-g" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                        <li><a class="fab fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                        <li><a class="fab fa-linkedin-in" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                        <li><a class="fab fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                     }
                     <?php else: ?>
                        <a class="white_btn" href="/register">ĐĂNG KÝ</a>
                     <?php endif; ?>
                  </ul>
               </div>
            </div>
            <div class="float-right">
               <?php if(session('thanhVien')): ?>
                  <div class="make_appo"> <a class="btn white_btn" href="/member-logout"><?php echo e(session('thanhVien')->HoTen); ?></a></div>
               <?php else: ?>
                  <div class="make_appo"> <a class="btn white_btn" href="#" data-toggle="modal" data-target="#member-login">BẠN LÀ THÀNH VIÊN?</a> </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
  </div>
</div>
<!-- end header top -->
<!-- header bottom -->
<div class="header_bottom">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <!-- logo start -->
            <div class="logo"> <a href="/trangchu"><img src="/It_next/images/logos/it_logo.png" alt="It store" /></a> </div>
            <!-- logo end -->
         </div>
         <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <!-- menu start -->
            <div class="menu_side">
               <div id="navbar_menu">
                  <ul class="first-ul">
                     <li><a class="<?php echo e(Request::is('trangchu') ? 'active' : ''); ?>" href="/trangchu">Trang chủ</a></li>
                     <li><a class="<?php echo e(Request::is('gioithieu') ? 'active' : ''); ?>" href="/gioithieu">Giới thiệu</a></li>
                     <li> <a class="<?php $__env->startSection('sanpham'); ?><?php echo $__env->yieldSection(); ?>" href="/sanpham">Sản phẩm</a>
                           <ul>
                              <li><a href="/sanpham">Tất cả sản phẩm</a></li>
                              <li> <a href="#">Sản phẩm theo danh mục</a>
                                 <ul>
                                    <?php $__currentLoopData = $danhMuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="/danhmuc/sanpham/<?php echo e($dm->Id); ?>"><?php echo e($dm->DanhMuc); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                              </li>
                              <li> <a href="#">Sản phẩm thương hiệu</a>
                                 <ul>
                                    <?php $__currentLoopData = $thuongHieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="/thuonghieu/sanpham/<?php echo e($th->Id); ?>"><?php echo e($th->ThuongHieu); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                              </li>
                              <li><a href="/sanphamkhuyenmai">Sản phẩm khuyến mại</a></li>
                           </ul>
                     </li>
                     <li> <a class="<?php $__env->startSection('blog'); ?><?php echo $__env->yieldSection(); ?>" href="/blog">Bài viết</a>
                           <ul>
                              <li><a href="/blog">Tất cả bài viết</a></li>
                              <li><a href="/chude/">Bài viết theo chủ đề</a>
                                 <ul>
                                    <?php $__currentLoopData = $chuDe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="/chude/blog/<?php echo e($cd->Id); ?>"><?php echo e($cd->TenChuDe); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                              </li>
                           </ul>
                     </li>
                     <li> <a class="<?php echo e(Request::is('lienhe') ? 'active' : ''); ?>" href="/lienhe">Liên hệ</a></li>

                     <li style="color: black;font-size:14px;font-weight:bold;"> <a class="<?php echo e(Request::is('listcart') ? 'active' : ''); ?><?php $__env->startSection('cart'); ?><?php echo $__env->yieldSection(); ?>" href="/listcart"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG (
                        <?php if(Session::has('Cart')): ?>
                           <span id="total-quanty-show"><?php echo e(Session::get('Cart')->totalQuanty); ?></span>
                        <?php else: ?>
                           <span id="total-quanty-show">trống</span>
                        <?php endif; ?>)</a>
                           <ul><li><div class="product-table" id="change-item-cart">
                              <?php if(session('Cart')): ?>
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
                                          <td class="col-md-2"><p><b><?php echo e(number_format($item['price'])); ?></b> <i>vnđ</i></p></td>
                                          <td class="col-md-1"><i class="close fas fa-times" data-id=<?php echo e($item['product']['Id']); ?>></i></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <tr>
                                          <td><p>total: <?php echo e(session('Cart')->totalQuanty); ?></p></td>
                                          <td> => </td>
                                          <td><h5><?php echo e(number_format(session('Cart')->totalPrice)); ?> <i>vnđ</i></h5></td>
                                          <input type="hidden" id="total-quanty" value="">
                                       </tr>
                                 </tbody>
                              </table>
                              <?php else: ?>
                              <div>
                                 <h5>Bạn chưa quyết định chọn sản phẩm nào!</h5>
                                 <p>total => 0 <i>vnđ</i></p>
                              </div>
                              <?php endif; ?>
                           </div></li></ul>
                     </li>
                  </ul>
               </div>
               <div class="search_icon">
                  <ul>
                     <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
            <!-- menu end -->
         </div>
      </div>
   </div>
</div>
<!-- header bottom end -->

   <script src="<?php echo e(asset('/js/jquery-3.2.1.min.js')); ?>"></script>
   <script>
      $('#change-item-cart').on("click", ".fa-times", function(){
         // console.log($(this).data("id"));
         $.ajax({
         url: '/del-from-cart/'+$(this).data("id"),
         type: 'GET',
         }).done(function(response){
            console.log(response);
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            // $("#list-cart").empty();
            // $("#list-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty").val());
            alertify.success('Xóa giỏ hàng thành công!');
         });
      });
   </script><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layouts/header.blade.php ENDPATH**/ ?>