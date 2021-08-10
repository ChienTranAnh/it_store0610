
    <div class="side_bar">
        <div class="side_bar_blog">
            <h4>TÌM KIẾM</h4>
            <form action="/blog" method="GET">
                <div class="side_bar_search">
                    <div class="input-group stylish-input-group">
                    <input class="form-control" type="text" name="tuKhoa" value="<?php echo e($tuKhoa ?? ''); ?>" placeholder="Tìm kiếm bài viết">
                    <span class="input-group-addon">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="side_bar_blog">
            <h4>TÁC GIẢ</h4>
            
        </div>
        <div class="side_bar_blog">
            <h4>Chủ đề</h4>
            <div class="categary">
                <ul>
                    <?php $__currentLoopData = $chuDe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="/chude/blog/<?php echo e($cd->Id); ?>"><i class="fa fa-angle-right"></i> <?php echo e($cd->TenChuDe); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>BÀI VIẾT GẦN ĐÂY</h4>
            <div class="recent_post">
                <ul>
                    <?php $__currentLoopData = $last_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p class="post_head"><a href="/blog-detail/<?php echo e($bl->Id); ?>"><?php echo e($bl->TieuDe); ?></a></p>
                        <p class="post_date"><i class="fas fa-calendar-alt" aria-hidden="true"></i> <?php echo e(\Carbon\Carbon::parse($bl->NgaySua)->format('d M Y')); ?></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
          <h4>BÀI VIẾT THEO THÁNG</h4>
          <div class="categary">
            <ul>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 6 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 7 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 3 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 11 (12)</a></li>
              <li><a href="#"><i class="fa fa-caret-right"></i> Tháng 12 (12)</a></li>
            </ul>
          </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layouts/rightbarBlog.blade.php ENDPATH**/ ?>