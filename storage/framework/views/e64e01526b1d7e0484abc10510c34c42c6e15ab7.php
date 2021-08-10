

<?php $__env->startSection('title'); ?>
  <?php echo e($sanPham->TenSanPham); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb', 'Chi tiết sản phẩm'); ?>
<?php $__env->startSection('sanpham', 'active'); ?>
<?php $__env->startSection('body', 'it_shop_detail'); ?>

<link rel="stylesheet" href="<?php echo e(asset('/It_next/css/mystyle.css')); ?>" />

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- section -->
<div class="section padding_layout_1 product_detail">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <div class="row">
               <div class="col-xl-6 col-lg-12 col-md-12">
                  <div class="product_detail_feature_img hizoom hi2">
                     <div class='hizoom hi2'>
                        <?php if($sanPham->GiaKhuyenMai != 0): ?>
                           <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        <?php elseif($sanPham->TrangThaiId == 2): ?>
                           <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                        <?php elseif($sanPham->TrangThaiId == 3): ?>
                           <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                        <?php endif; ?>
                        <img src="/images/<?php echo e($sanPham->AnhSanPham); ?>" width="400" alt="<?php echo e($sanPham->TenSanPham); ?>" />
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
                  <div class="product-heading"><h2><?php echo e($sanPham->TenSanPham); ?></h2></div>
                  <div class="product-detail-side">
                     <?php if($sanPham->GiaKhuyenMai > 0): ?>
                        <span><del>$<?php echo e(number_format($sanPham->GiaSanPham)); ?></del></span><span class="new-price">$<?php echo e(number_format($sanPham->GiaKhuyenMai)); ?> <b style="font-size: 16px"><i>vnđ</i></b></span></br>
                     <?php else: ?>
                        <span class="new-price">$<?php echo e(number_format($sanPham->GiaSanPham)); ?> <b style="font-size: 16px"><i>vnđ</i></b></span></br>
                     <?php endif; ?>
                     <span class="rating">
                        <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="far fa-star" aria-hidden="true"></i>
                     </span>
                     <span class="review">(5 customer review)</span>
                  </div>
                  <div class="detail-contant">
                     <?php echo $sanPham->MoTa; ?>

                     <br>
                     <?php $__currentLoopData = $trangThai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sanPham->TrangThaiId == $tt->Id): ?>
                           <?php switch($tt->Id):
                              case (1): ?>
                                 <span class="stock" style="color: green"><b><?php echo e($tt->TrangThai); ?></b></span></br>
                                 Số lượng: <span class="stock"><?php echo e($sanPham->SoLuong); ?></span></p>
                                 <div class="cart">
                                    <div class="quantity"><input step="1" min="1" max="<?php echo e($sanPham->SoLuong); ?>" name="quanty" value="1" title="Qty" class="input-text qty text" size="4" type="number"></div>
                                    <button onclick="addCart(<?php echo e($sanPham->Id); ?>)" class="btn sqaure_bt"><i class="icon fas fa-cart-plus"></i> &nbsp; thêm giỏ hàng</button>
                                 </div>
                                 <?php break; ?>
                              <?php case (2): ?>
                                 <span class="stock" style="color: red"><b><?php echo e($tt->TrangThai); ?></b></span></br>
                                 <span class="col-md-6"></span>
                                 <?php break; ?>
                              <?php case (3): ?>
                                 <span class="stock" style="color: navy"><b><?php echo e($tt->TrangThai); ?></b></span></br>
                                 <span class="stock col-md-6"></span>
                                 <?php break; ?>
                              <?php default: ?>
                           <?php endswitch; ?>
                        <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div class="share-post"> <a href="#" class="share-text">Gửi cho bạn bè:</a>
                     <ul class="social_icons">
                        <li><a href="https://www.facebook.com/chien.toet"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="tab_bar_section">
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Miêu tả</a> </li>
                           <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Nhận xét ()</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div id="description" class="tab-pane active">
                              <div class="product_desc">
                                 <button class="btn-flat btn-hover btn-view-description" id="view-all-description">
                                    xem tiếp
                                 </button>
                                 <div class="product-detail-description-content">
                                    <?php echo $sanPham->NoiDung; ?>

                                 </div>
                              </div>
                           </div>
                           <div id="reviews" class="tab-pane fade">
                              <div class="product_review">
                                 <h3>Nhận xét ()</h3>
                                 <div class="commant-text row">
                                    <div class="col-lg-2 col-md-2 col-sm-4">
                                       <div class="profile"> <img class="img-responsive" src="#" alt="client 1"> </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                       <h5>David</h5>
                                       <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                       <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                       <p class="msg">ThisThis book is a treatise on the theory of ethics, very popular during the Renaissance. 
                                       The first line of Lorem Ipsum, “Lorem ipsum dolor sit amet.. </p>
                                    </div>
                                 </div>
                                 <div class="commant-text row">
                                       <div class="col-lg-2 col-md-2 col-sm-4">
                                          <div class="profile"> <img class="img-responsive" src="#" alt="client 2"> </div>
                                       </div>
                                       <div class="col-lg-10 col-md-10 col-sm-8">
                                          <h5>Jack</h5>
                                          <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                          <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                          <p class="msg">Nunc augue purus, posuere in accumsan sodales ac, euismod at est. Nunc faccumsan ermentum consectetur metus placerat mattis. Praesent mollis justo felis, accumsan faucibus mi maximus et. Nam hendrerit mauris id scelerisque placerat. Nam vitae imperdiet turpis</p>
                                       </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="full review_bt_section">
                                          <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Nhận xét sản phẩm</a> </div>
                                       </div>
                                       <div class="full">
                                          <div id="collapseExample" class="full collapse commant_box">
                                             <form accept-charset="UTF-8" action="#" method="POST">
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Nhận xét của bạn ..."></textarea>
                                                <div class="full_bt center">
                                                   <button type="submit" class="btn sqaure_bt">Gửi</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                        <h3>Sản phẩm cùng thương hiệu</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php if(count($sp) > 1): ?>
                  <?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($p->Id != $sanPham->Id): ?>
                     <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           <?php if($p->GiaKhuyenMai != 0): ?>
                              <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                           <?php elseif($p->TrangThaiId == 2): ?>
                              <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                           <?php elseif($p->TrangThaiId == 3): ?>
                              <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                           <?php endif; ?>
                           <div class="product_img"> <img class="img-responsive" src="/images/<?php echo e($p->AnhSanPham); ?>" alt=""> </div>
                           <div class="product_detail_btm">
                              <div class="center">
                                 <h4><a href="/sanphamchitiet/<?php echo e($p->Id); ?>"><?php echo e($p->TenSanPham); ?></a></h4>
                              </div>
                              <div class="starratin">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                              </div>
                              <?php if($p->GiaKhuyenMai): ?>
                              <div class="product_price">
                                 <p><span class="old_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaSanPham)); ?> <i>vnđ</i></span> – <span class="new_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaKhuyenMai)); ?> <i>vnđ</i></span></p>
                              </div>
                              <?php else: ?>
                              <div class="product_price">
                                 <p><span class="new_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaSanPham)); ?> <i>vnđ</i></span></p>
                              </div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php else: ?>
                  <div class="col-sm-6 col-xs-12 margin_bottom_30_all">Không tìm thấy sản phẩm cùng thương hiệu.</div>
               <?php endif; ?>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                        <h3>Sản phẩm cùng danh mục</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php if(count($sps) > 1): ?>
                  <?php $__currentLoopData = $sps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($p->Id != $sanPham->Id): ?>
                     <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           <?php if($p->GiaKhuyenMai != 0): ?>
                              <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                           <?php elseif($p->TrangThaiId == 2): ?>
                              <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                           <?php elseif($p->TrangThaiId == 3): ?>
                              <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                           <?php endif; ?>
                           <div class="product_img"> <img class="img-responsive" src="/images/<?php echo e($p->AnhSanPham); ?>" alt=""></div>
                           <div class="product_detail_btm">
                              <div class="center"><h4><a href="/sanphamchitiet/<?php echo e($p->Id); ?>"><?php echo e($p->TenSanPham); ?></a></h4></div>
                              <div class="starratin">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i></div>
                              </div>
                              <?php if($p->GiaKhuyenMai): ?>
                              <div class="product_price">
                                 <p><span class="old_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaSanPham)); ?> <i>vnđ</i></span> – <span class="new_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaKhuyenMai)); ?> <i>vnđ</i></span></p>
                              </div>
                              <?php else: ?>
                              <div class="product_price">
                                 <p><span class="new_price"><i class="fas fa-dollar-sign"></i> <?php echo e(number_format($p->GiaSanPham)); ?> <i>vnđ</i></span></p>
                              </div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php else: ?>
                  <div class="col-sm-6 col-xs-12 margin_bottom_30_all">Không tìm thấy sản phẩm cùng danh mục.</div>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-md-3">
            <?php if ($__env->exists('layouts.rightbarProduct')) echo $__env->make('layouts.rightbarProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
      </div>
   </div>
</div>
<!-- end section -->
<!-- zoom effect -->

<script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
<script>
  function addCart(id){
    $.ajax({
      url: '/add-to-cart/'+id,
      type: 'GET',
      }).done(function(response){
         console.log(response);
         $("#change-item-cart").empty();
         $("#list-cart").empty();
         $("#change-item-cart").html(response);
         $("#list-cart").html(response);
         $("#total-quanty-show").text($("#total-quanty").val());
         alertify.success('Thêm vào giỏ hàng thành công!');
      });
  };
  
   document.querySelector('#view-all-description').addEventListener('click', () => {
      let content = document.querySelector('.product-detail-description-content')
      content.classList.toggle('active')
      document.querySelector('#view-all-description').innerHTML = content.classList.contains('active') ? 'thu gọn' : 'xem tiếp'
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_shop_detail.blade.php ENDPATH**/ ?>