@extends('layouts.master')

@section('title')
  {{ $blog->TieuDe }}
@endsection
@section('breadcrumb', 'Chi tiết bài viết')
@section('blog', 'active')
@section('body', 'it_service blog_detail')

@section('content')
  @includeIf('layouts.breadcrumb')
    <!-- section -->
    <div class="section padding_layout_1 blog_grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="full">
                        <div class="blog_section margin_bottom_0">
                            <div class="blog_feature_img"> <img class="img-responsive" src="/blogs/{{ $blog->Anh }}" alt="#"> </div>
                            <div class="blog_feature_cantant">
                                <h3> {{ $blog->TieuDe }} </h3>
                                <div class="post_info">
                                    <ul>
                                        <li><i class="fa fa-user" aria-hidden="true"></i>
                                        @foreach ($bloger as $blg)
                                            @if($blog->BloggerId == $blg->Id)
                                                {{ $blg->UserName }}
                                            @endif
                                        @endforeach
                                        </li>
                                    <li><i class="fas fa-eye" aria-hidden="true"></i> {{ $blog->LuotXem }}</li>
                                    {{-- <li><i class="fa fa-comment" aria-hidden="true"></i> 5</li> --}}
                                    <li><i class="fas fa-calendar-day" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($blog->NgaySua)->format('d M Y H:m') }}</li>
                                    </ul>
                                </div>
                                <p>{!! $blog->MoTa !!}</p>
                            </div>
                            <p>{!! $blog->NoiDung !!}</p>
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
                            {{-- <div class="view_commant">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client1.png" alt="#"> </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                    <div class="full theme_bg white_fonts command_cont">
                                        <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                                        <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually 
                                        begin making changes in your life. Specific intentional changes are not easy. They are intentional because these 
                                        changes are changes that you are choosing and they are the changes that will cause you to live the life you want 
                                        to live and dream. </p>
                                    </div>
                                    <div class="full">
                                        <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                            <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client2.png" alt="#"> </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                            <div class="full command_cont margin_bottom_0">
                                            <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                                            <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually 
                                                begin making changes in your life. Specific intentional changes are not easy. They are 
                                                intentional because these changes are changes. </p>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                            <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client3.png" alt="#"> </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                            <div class="full command_cont">
                                            <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                                            <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually 
                                                begin making changes in your life. Specific intentional changes are not easy. They are 
                                                intentional because these changes are changes. </p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client1.png" alt="#"> </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                    <div class="full theme_bg white_fonts command_cont">
                                        <p class="comm_head">Christian Perez <span>Sep 27,2017</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                                        <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually 
                                        begin making changes in your life. Specific intentional changes are not easy. They are intentional because these 
                                        changes are changes that you are choosing and they are the changes that will cause you to live the life you want 
                                        to live and dream. </p>
                                    </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="post_commt_form">
                            @if(session('thanhVien'))
                                <h4>Nhận xét của {{session('thanhVien')->UserName}}</h4>
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
                            @else
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
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                    @includeIf('layouts.rightbarBlog')
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection