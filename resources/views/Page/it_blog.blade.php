@extends('layouts.master')

@section('title', 'Blog')
@section('breadcrumb', 'Blog')
@section('blog', 'active')
@section('body', 'it_service blog')

@section('content')
   @includeIf('layouts.breadcrumb')
   <!-- section -->
   <div class="section padding_layout_1 blog_list">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
               <div class="row">Hiển thị {{ count($blog) }} bài viết/ trang</div>
               <div class="row"><label class="col-md-12"></label></div>
               <div class="full">
                  @foreach ($blog as $bl)
                  <div class="blog_section">
                     <div class="blog_feature_img">
                        <img class="img-responsive" src="/blogs/{{ $bl->Anh }}" alt="#">
                     </div>
                     <div class="blog_feature_cantant">
                        <a href="/blog-detail/{{ $bl->Id }}"><h3>{{ $bl->TieuDe }}</h3></a>
                        <div class="post_info">
                           <ul>
                              <li><i class="fas fa-user" aria-hidden="true"></i>
                                 @foreach ($bloger as $blg)
                                    @if($bl->BloggerId == $blg->Id)
                                       {{ $blg->UserName }}
                                    @endif
                                 @endforeach
                              </li>
                              <li><i class="fas fa-eye" aria-hidden="true"></i> {{ $bl->LuotXem }}</li>
                              {{-- <li><i class="fa fa-comment" aria-hidden="true"></i> 5</li> --}}
                              <li><i class="far fa-calendar-alt" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($bl->NgaySua)->format('d M Y H:m') }}</li>
                           </ul>
                        </div>
                        <p>{!! $bl->MoTa !!}</p>
                        <div class="bottom_info">
                           <div class="pull-left"><a class="btn sqaure_bt" href="/blog-detail/{{ $bl->Id }}">Chi tiết<i class="fa fa-angle-right"></i></a></div>
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
                  @endforeach
                  <div class="center">
                     <ul class="pagination style_1">
                        {{ $blog->links() }}
                     </ul>
                  </div>
               </div>
               {{-- <div class="row"></div> --}}
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
               @includeIf('layouts.rightbarBlog')
            </div>
         </div>
      </div>
   </div>
   <!-- end section -->
@endsection