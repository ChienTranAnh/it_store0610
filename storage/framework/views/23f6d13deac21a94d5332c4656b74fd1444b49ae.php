<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <!-- Twitter meta-->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@pratikborsadiya">
        <meta property="twitter:creator" content="@pratikborsadiya">
        <!-- Open Graph Meta-->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <title>Admin - <?php $__env->startSection('title'); ?><?php echo $__env->yieldSection(); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- site icons -->
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/fa-user-lock.png')); ?>" />
        
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <?php if ($__env->exists('layoutsAd.nav')) echo $__env->make('layoutsAd.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php if ($__env->exists('layoutsAd.sidebar')) echo $__env->make('layoutsAd.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="app-content">
            
            <?php if ($__env->exists('layoutsAd.breadcrumb')) echo $__env->make('layoutsAd.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
                <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Essential javascripts for application to work-->
        <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="<?php echo e(asset('js/plugins/pace.min.js')); ?>"></script>
        <!-- Page specific javascripts-->
        <!-- Data table plugin-->
        <script type="text/javascript" src="<?php echo e(asset('js/plugins/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/plugins/dataTables.bootstrap.min.js')); ?>"></script>
        <script type="text/javascript">$('#danhSachTable').DataTable();</script>
        <script type="text/javascript">$('#danhSachTableTT').DataTable();</script>
        <!-- Google analytics script-->
        <script type="text/javascript">
            if(document.location.hostname == 'pratikborsadiya.in') {
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', 'UA-72504830-1', 'auto');
                ga('send', 'pageview');
            }

            // checkbox duyệt trong bảng
            $(document).ready(function() {
                var $selectAll = $('#selectAll'); // main checkbox inside table thead
                var $table = $('.table'); // table selector 
                var $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
                var tdCheckboxChecked = 0; // checked checboxes

                // Select or deselect all checkboxes depending on main checkbox change
                $selectAll.on('click', function () {
                    $tdCheckbox.prop('checked', this.checked);
                });

                // Toggle main checkbox state to checked when all checkboxes inside tbody tag is checked
                $tdCheckbox.on('change', function(e){
                    tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; // Get count of checkboxes that is checked
                    // if all checkboxes are checked, then set property of main checkbox to "true", else set to "false"
                    $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
                });
            });
        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/layoutsAd/admin.blade.php ENDPATH**/ ?>