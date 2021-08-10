

<?php $__env->startSection('title', 'Blog'); ?>
<?php $__env->startSection('breadcrumb', 'Blog'); ?>
<?php $__env->startSection('blog', 'active'); ?>
<?php $__env->startSection('body', 'it_service blog'); ?>

<?php $__env->startSection('content'); ?>
   <?php if ($__env->exists('layouts.breadcrumb')) echo $__env->make('layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- section -->
   <div class="section padding_layout_1 blog_list">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
               <div class="full">
                  <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="blog_section">
                     <div class="blog_feature_img">
                        <img class="img-responsive" src="/blogs/<?php echo e($bl->Anh); ?>" alt="#">
                     </div>
                     <div class="blog_feature_cantant">
                        <a href="/blog-detail/<?php echo e($bl->Id); ?>"><p class="blog_head"><?php echo e($bl->TieuDe); ?></p></a>
                        <div class="post_info">
                           <ul>
                              <li><i class="fas fa-user" aria-hidden="true"></i>
                                 <?php $__currentLoopData = $bloger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($bl->BloggerId == $blg->Id): ?>
                                       <?php echo e($blg->UserName); ?>

                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </li>
                              <li><i class="fas fa-eye" aria-hidden="true"></i> <?php echo e($bl->LuotXem); ?></li>
                              
                              <li><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo e(\Carbon\Carbon::parse($bl->NgaySua)->format('d M Y H:m')); ?></li>
                           </ul>
                        </div>
                        <p><?php echo $bl->MoTa; ?></p>
                        <div class="bottom_info">
                           <div class="pull-left"><a class="btn sqaure_bt" href="/blog-detail/<?php echo e($bl->Id); ?>">Chi tiết<i class="fa fa-angle-right"></i></a></div>
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
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <div class="center">
                     <ul class="pagination style_1">
                        <?php echo e($blog->links()); ?>

                     </ul>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views//page/it_blog.blade.php ENDPATH**/ ?>