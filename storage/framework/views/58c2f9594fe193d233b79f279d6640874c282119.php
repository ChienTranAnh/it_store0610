

<?php $__env->startSection('title'); ?>
  <?php echo e($blog->TieuDe); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb', 'Chi tiết bài viết'); ?>
<?php $__env->startSection('blog', 'active'); ?>
<?php $__env->startSection('body', 'it_service blog_detail'); ?>

<?php $__env->startSection('content'); ?>
  <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- section -->
    <div class="section padding_layout_1 blog_grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="full">
                        <div class="blog_section margin_bottom_0">
                            <div class="blog_feature_img"> <img class="img-responsive" src="/blogs/<?php echo e($blog->Anh); ?>" alt="#"> </div>
                            <div class="blog_feature_cantant">
                                <h3> <?php echo e($blog->TieuDe); ?> </h3>
                                <div class="post_info">
                                    <ul>
                                        <li><i class="fa fa-user" aria-hidden="true"></i>
                                        <?php $__currentLoopData = $bloger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($blog->BloggerId == $blg->Id): ?>
                                                <?php echo e($blg->UserName); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                    <li><i class="fas fa-eye" aria-hidden="true"></i> <?php echo e($blog->LuotXem); ?></li>
                                    
                                    <li><i class="fas fa-calendar-day" aria-hidden="true"></i> <?php echo e(\Carbon\Carbon::parse($blog->NgaySua)->format('d M Y H:m')); ?></li>
                                    </ul>
                                </div>
                                <p><?php echo $blog->MoTa; ?></p>
                            </div>
                            <p><?php echo $blog->NoiDung; ?></p>
                            <div class="bottom_info margin_bottom_30_all">
                                <div class="pull-right">
                                    <div class="shr">Chia sẻ: </div>
                                    <div class="social_icon">
                                        <ul>
                                            <li class="fb"><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                            <li class="twi"><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="gp"><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                                            <li class="pint"><a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_section">
                                <div class="pull-left text_align_left">
                                    <div class="full">
                                        <div class="preview_commt"> <a class="comment_cantrol preview_commat" href="it_blog_detail.html"> <img class="img-responsive" src="#" alt="Ảnh bài trước"> <span><i class="fa fa-angle-left"></i> Previous</span> </a> </div>
                                    </div>
                                </div>
                                <div class="pull-right text_align_right">
                                    <div class="full">
                                        <div class="next_commt"> <a class="comment_cantrol preview_commat" href="it_blog_detail.html"> <img class="img-responsive" src="#" alt="Ảnh bài sau"> <span>Next <i class="fa fa-angle-right"></i></span> </a> </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post_commt_form">
                            <?php if(session('thanhVien')): ?>
                                <h4>Nhận xét của <?php echo e(session('thanhVien')->UserName); ?></h4>
                                <div class="form_section">
                                    <form class="form_contant" action="#">
                                        <fieldset class="row">
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="field_custom" placeholder="Nhận xét của bạn . . ." required></textarea>
                                            </div>
                                            <div class="center">
                                                <button class="btn main_bt">GỬI</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            <?php else: ?>
                                <h4>NHẬN XÉT CỦA BẠN</h4>
                                <div class="form_section">
                                    <form class="form_contant" action="#">
                                        <fieldset class="row">
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Email" type="email" required>
                                            </div>
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Điện thoại" type="text" required>
                                            </div>
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Mật khẩu" type="password" required>
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="field_custom" placeholder="Nhận xét của bạn . . ." required></textarea>
                                            </div>
                                            <div class="center">
                                                <button class="btn main_bt">GỬI</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                    <?php if ($__env->exists('layouts.rightbarBlog')) echo $__env->make('layouts.rightbarBlog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/page/it_blog_detail.blade.php ENDPATH**/ ?>