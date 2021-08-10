<header class="app-header"><a class="app-header__logo" href="/trangchu" target="_blank">It store</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="far fa-bell fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                
            </ul>
        </li>
        <!-- User Menu-->
        <?php if(session('user')): ?>
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu" title="<?php echo e(session('user')->HoTen); ?>"><i class="fa fa-user fa-lg"></i>&nbsp;<?php echo e(session('user')->UserName); ?></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i>Thông tin cá nhân</a></li>
                    <li><a class="dropdown-item" href="/dangxuat"><i class="fas fa-sign-out-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Đăng xuất</a></li>
                </ul>
            </li>
        <?php else: ?>
            <li class="dropdown"><a class="app-nav__item" href="/dangnhap" title=" Đăng nhập"><i class="fa fa-user fa-lg"></i></a></li>
        <?php endif; ?>
    </ul>
</header><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layoutsAd/nav.blade.php ENDPATH**/ ?>