<aside class="app-sidebar">
    <?php if(session('user')): ?>
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="#" alt="Avatar" title="Avatar">
            <div>
                <p class="app-sidebar__user-name"><?php echo e(session('user')->HoTen); ?></p>
                <p class="app-sidebar__user-designation">
                    <?php if(session('user')->VaiTroId != null): ?>
                        <?php $__currentLoopData = $vaiTro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(session('user')->VaiTroId == $vt->Id): ?> <?php echo e($vt->VaiTro); ?> <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?> chưa phân quyền
                    <?php endif; ?>
                </p>
            </div>
        </div>
    <?php endif; ?>
    <ul class="app-menu">
        <li><a class="app-menu__item <?php $__env->startSection('dashboard'); ?><?php echo $__env->yieldSection(); ?>" href="/dashboard"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview <?php $__env->startSection('slide'); ?><?php echo $__env->yieldSection(); ?>""><a class="app-menu__item" href="/slide/danhsach" data-toggle="treeview"><i class="app-menu__icon fab fa-slideshare"></i><span class="app-menu__label">Slide</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('slide/danhsach') ? " active" : ""); ?>" href="/slide/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('slide/them-moi') ? " active" : ""); ?>" href="/slide/them-moi"><i class="icon fas fa-plus-circle"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('sanpham'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-laptop"></i><span class="app-menu__label">Sản phẩm</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('sanpham/danhsach') ? " active" : ""); ?>" href="/sanpham/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('sanpham/them-moi') ? " active" : ""); ?>" href="/sanpham/them-moi"><i class="icon far fa-plus-square"></i>Thêm mới</a></li>
                <li><a class="treeview-item <?php $__env->startSection('chitietsanpham'); ?><?php echo $__env->yieldSection(); ?>" href="#"><i class="icon far fa-eye"></i>Chi tiết</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('danhmuc'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Danh mục sản phẩm</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('danhmuc/danhsach') ? " active" : ""); ?>" href="/danhmuc/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('danhmuc/them-moi') ? " active" : ""); ?>" href="/danhmuc/them-moi"><i class="icon fas fa-plus-square"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('thuonghieu'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-trademark"></i><span class="app-menu__label">Thương hiệu</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('thuonghieu/danhsach') ? " active" : ""); ?>" href="/thuonghieu/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('thuonghieu/them-moi') ? " active" : ""); ?>" href="/thuonghieu/them-moi"><i class="icon fas fa-plus-circle"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('donhang'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-book"></i><span class="app-menu__label">Đơn hàng</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('donhang/danhsach') ? " active" : ""); ?>" href="/donhang/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('khachhang'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item <?php $__env->startSection('khachhang'); ?><?php echo $__env->yieldSection(); ?>" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-people-arrows"></i><span class="app-menu__label">Khách hàng</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('khachhang/danhsach') ? " active" : ""); ?>" href="/khachhang/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item" href="/register"><i class="icon fas fa-plus-square"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('loaikhang'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-handshake"></i><span class="app-menu__label">Loại Khách hàng</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('loaikhang/danhsach') ? " active" : ""); ?>" href="/loaikhang/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item" href="/loaikhang/them-moi"><i class="icon fas fa-plus-circle"></i>Thêm mới</a></li>
            </ul>
        </li>
        <?php if(Session('user')->VaiTroId == "ADMIN" || Session('user')->VaiTroId == "SUPER"): ?>
        <li class="treeview <?php $__env->startSection('nguoidung'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-user"></i><span class="app-menu__label">Users</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('nguoidung/danhsach') ? " active" : ""); ?>" href="/nguoidung/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('nguoidung/them-moi') ? " active" : ""); ?>" href="/nguoidung/them-moi"><i class="icon fas fa-user-plus"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('vaitro'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-user-friends"></i><span class="app-menu__label">Vai trò</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('vaitro/danhsach') ? " active" : ""); ?>" href="/vaitro/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('vaitro/them-moi') ? " active" : ""); ?>" href="/vaitro/them-moi"><i class="icon fas fa-user-shield"></i>Thêm mới</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <li class="treeview <?php $__env->startSection('trangthai'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-user-friends"></i><span class="app-menu__label">Trạng thái</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item <?php $__env->startSection('ttdanhsach'); ?><?php echo $__env->yieldSection(); ?>" href="/trangthai/danhsach"><i class="icon fas fa-list-ul"></i>Danh sách</a></li>
                <li><a class="treeview-item <?php $__env->startSection('ttthem-moi'); ?><?php echo $__env->yieldSection(); ?>" href="/trangthai/them-moi"><i class="icon fas fa-plus-circle"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('blog'); ?><?php echo $__env->yieldSection(); ?>"><a class="app-menu__item" href="/blog/danhsach" data-toggle="treeview"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Blog</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('blog/danhsach') ? " active" : ""); ?>" href="/blog/danhsach"><i class="icon fas fa-stream"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('blog/them-moi') ? " active" : ""); ?>" href="/blog/them-moi"><i class="icon far fa-file"></i>Thêm mới</a></li>
                <li><a class="treeview-item <?php $__env->startSection('blog_detail'); ?><?php echo $__env->yieldSection(); ?>" href="#"><i class="icon fas fa-pen"></i>Chi tiết</a></li>
            </ul>
        </li>
        <li class="treeview <?php $__env->startSection('chude'); ?><?php echo $__env->yieldSection(); ?>""><a class="app-menu__item" href="/chude/danhsach" data-toggle="treeview"><i class="app-menu__icon fas fa-grip-lines"></i><span class="app-menu__label">Chủ đề</span><i class="treeview-indicator fas fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item<?php echo e(Request::is('chude/danhsach') ? " active" : ""); ?>" href="/chude/danhsach"><i class="icon fas fa-stream"></i>Danh sách</a></li>
                <li><a class="treeview-item<?php echo e(Request::is('chude/them-moi') ? " active" : ""); ?>" href="/chude/them-moi"><i class="icon fas fa-plus-circle"></i>Thêm mới</a></li>
            </ul>
        </li>
    </ul>
</aside>
<?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layoutsAd/sidebar.blade.php ENDPATH**/ ?>