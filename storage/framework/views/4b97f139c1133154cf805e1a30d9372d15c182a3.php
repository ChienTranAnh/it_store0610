
    <div class="side_bar">
        <div class="side_bar_blog">
            <h4>TÌM KIẾM</h4>
            <form action="/sanpham" method="GET">
                <div class="side_bar_search">
                    <div class="input-group stylish-input-group">
                    <input class="form-control" type="text" name="tuKhoa" value="<?php echo e($tuKhoa ?? ''); ?>" placeholder="Tìm kiếm sản phẩm">
                    <span class="input-group-addon">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="side_bar_blog">
            <h4>ABOUT AUTHOR</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            <h4>GET A QUOTE</h4>
            <p>An duo lorem altera gloriatur. No imperdiet adver sarium pro. No sit sumo lorem. Mei ea eius elitr consequ unturimperdiet.</p>
            <a class="btn sqaure_bt" href="it_service.html">View Service</a>
        </div>
        <div class="side_bar_blog">
            <h4>Danh mục sản phẩm</h4>
            <div class="categary">
            <ul>
                <?php $__currentLoopData = $danhMuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="/danhmuc/sanpham/<?php echo e($dm->Id); ?>"><i class="fa fa-angle-right"></i> <?php echo e($dm->DanhMuc); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>RECENT POST</h4>
            <div class="recent_post">
            <ul>
                <li>
                <p class="post_head"><a href="#">How To Look Up</a></p>
                <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20, 2017</p>
                </li>
                <li>
                <p class="post_head"><a href="#">Compatible Inkjet Cartridge</a></p>
                <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20, 2017</p>
                </li>
                <li>
                <p class="post_head"><a href="#">Treat That Oral Thrush Now</a></p>
                <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20, 2017</p>
                </li>
            </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>Tin gần đây</h4>
            <div class="categary">
            <ul>
                <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Land lights let be divided</a></li>
                <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Seasons over bearing air</a></li>
                <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Greater open after grass</a></li>
                <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Gathered was divide second</a></li>
            </ul>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layouts/rightbar.blade.php ENDPATH**/ ?>