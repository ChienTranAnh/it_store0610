<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>It store - @section('title')@show</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
  
    <!-- site icons -->
    <link rel="icon" href="/It_next/images/fevicon/fevicon.png" type="image/gif" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/bootstrap.min.css')}}" />
    <!-- Site css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/style.css')}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/responsive.css')}}" />
    <!-- colors css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/colors1.css')}}" />
    {{-- <link rel="stylesheet" href="{{asset('/It_next/css/colors1_dark.css')}}" /> --}}
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/custom.css')}}" />
    <!-- wow Animation css -->
    <link rel="stylesheet" href="{{asset('/It_next/css/animate.css')}}" />
    <!-- zoom effect -->
    <link rel='stylesheet' href="{{asset('/It_next/css/hizoom.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/It_next/revolution/css/settings.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/It_next/revolution/css/layers.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/It_next/revolution/css/navigation.css')}}" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- RTL version -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
</head>

{{-- <body id="default_theme" class="it_service blog_detail"> --}}
{{-- <body id="default_theme" class="it_service blog"> --}}
{{-- <body id="default_theme" class="make_appointment"> --}}
{{-- <body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page"> --}}
{{-- <body id="default_theme" class="it_service it_serv_shopping_cart shopping-cart"> --}}
{{-- <body id="default_theme" class="it_shop_detail"> --}}
{{-- <body id="default_theme" class="it_shop_list"> --}}
    {{-- it_service it_shop_detail it_serv_shopping_cart shopping-cart it_checkout checkout_page blog blog_detail --}}
<body id="default_theme" class="@section('body')@show">
    <!-- loader -->
    <div class="bg_load"> <img class="loader_animation" src="/It_next/images/loaders/loader_1.png" alt="#" /> </div>
    <!-- end loader -->

    <!-- header -->
    <header id="default_header" class="header_style_1">
        @includeIf('layouts.header')
    </header>
    <!-- end header -->

    @yield('content')

    <!-- Modal search -->
    <div class="modal fade" id="search_bar" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                <div class="navbar-search">
                    <form action="/sanpham" method="get" id="search-global-form" class="search-global">
                    <input type="text" placeholder="Tìm kiếm" autocomplete="off" name="tuKhoa" id="search"
                        value="{{ $tuKhoa ?? '' }}" class="search-global__input">
                    <button type="submit" class="search-global__btn"><i class="fa fa-search"></i></button>
                    <div class="search-global__note">Bắt đầu tìm kiếm, click và quay lại trang xem kết quả tìm kiếm.</div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End Model search bar -->

    {{-- modal đăng nhập --}}
    <div class="modal fade" id="member-login" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" action="/member-login" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Đăng nhập</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="tile-body">
                                <div class="col-md-4"><label for="username">Username <span class="required">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" name="UserName" id="username" required="" type="text" placeholder="Nhập username">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                </div>
                                <div class="col-md-12"><label></label></div>
                                <div class="col-md-4"><label for="password">Password <span class="required">*</span></label></div>
                                <div class="col-md-12">
                                    <input class="form-control" name="MatKhau" id="password" required="" type="password" placeholder="Nhập mật khẩu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-md-12 col-sm-12 col-xs-12 btn-login">
                        <button type="submit" class="bt_main"><i class="fas fa-check-circle"></i> Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end modal đăng nhập --}}

    <!-- footer -->
    @includeIf('layouts.footer')
    <!-- end footer -->
    <!-- js section -->
    <script src="{{asset('/It_next/js/jquery.min.js')}}"></script>
    <script src="{{asset('/It_next/js/bootstrap.min.js')}}"></script>
    <!-- menu js -->
    <script src="{{asset('/It_next/js/menumaker.js')}}"></script>
    <!-- wow animation -->
    <script src="{{asset('/It_next/js/wow.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('/It_next/js/custom.js')}}"></script>
    <!-- revolution js files -->
    <script src="{{asset('/It_next/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('/It_next/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
</body>

</html>