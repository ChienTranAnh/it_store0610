<!-- header top -->
<div class="header_top">
  <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="full">
               <div class="topbar-left">
                  <ul class="list-inline">
                     <li> <span class="topbar-label"><i class="fa fa-home"></i></span> <span class="topbar-hightlight">Tầng 2 số 20 cuối ngõ 100 Nguyễn Chí Thanh, Đống Đa, Hà Nội</span> </li>
                     <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:tachienn@gmail.com">tachienn@gmail.com</a></span> </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="row col-md-4 right_section_header_top">
            <div class="float-left">
               <div class="social_icon">
                  <ul class="list-inline">
                     @if(session('thanhVien'))
                     {
                        <li><a class="fab fa-facebook-f" href="https://www.facebook.com/chien.toet" title="Facebook" target="_blank"></a></li>
                        <li><a class="fab fa-google-plus-g" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                        <li><a class="fab fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                        <li><a class="fab fa-linkedin-in" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                        <li><a class="fab fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                     }
                     @else
                        <a class="white_btn" href="/register">ĐĂNG KÝ</a>
                     @endif
                  </ul>
               </div>
            </div>
            <div class="float-right">
               @if(session('thanhVien'))
                  <div class="make_appo"> <a class="btn white_btn" href="/member-logout">{{ session('thanhVien')->HoTen }}</a></div>
               @else
                  <div class="make_appo"> <a class="btn white_btn" href="#" data-toggle="modal" data-target="#member-login">BẠN LÀ THÀNH VIÊN?</a> </div>
               @endif
            </div>
         </div>
      </div>
  </div>
</div>
<!-- end header top -->
<!-- header bottom -->
<div class="header_bottom">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <!-- logo start -->
            <div class="logo"> <a href="/trangchu"><img src="/It_next/images/logos/it_logo.png" alt="It store" /></a> </div>
            <!-- logo end -->
         </div>
         <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <!-- menu start -->
            <div class="menu_side">
               <div id="navbar_menu">
                  <ul class="first-ul">
                     <li><a class="{{Request::is('trangchu') ? 'active' : ''}}" href="/trangchu">Trang chủ</a></li>
                     <li><a class="{{Request::is('gioithieu') ? 'active' : ''}}" href="/gioithieu">Giới thiệu</a></li>
                     <li> <a class="@section('sanpham')@show" href="/sanpham">Sản phẩm</a>
                           <ul>
                              <li><a href="/sanpham">Tất cả sản phẩm</a></li>
                              <li> <a href="#">Sản phẩm theo danh mục</a>
                                 <ul>
                                    @foreach ($danhMuc as $dm)
                                       <li><a href="/danhmuc/sanpham/{{ $dm->Id }}">{{ $dm->DanhMuc }}</a></li>
                                    @endforeach
                                 </ul>
                              </li>
                              <li> <a href="#">Sản phẩm thương hiệu</a>
                                 <ul>
                                    @foreach ($thuongHieu as $th)
                                       <li><a href="/thuonghieu/sanpham/{{ $th->Id }}">{{ $th->ThuongHieu }}</a></li>
                                    @endforeach
                                 </ul>
                              </li>
                              <li><a href="/sanphamkhuyenmai">Sản phẩm khuyến mại</a></li>
                           </ul>
                     </li>
                     <li> <a class="@section('blog')@show" href="/blog">Bài viết</a>
                           <ul>
                              <li><a href="/blog">Tất cả bài viết</a></li>
                              <li><a href="/chude/">Bài viết theo chủ đề</a>
                                 <ul>
                                    @foreach ($chuDe as $cd)
                                       <li><a href="/chude/blog/{{ $cd->Id }}">{{ $cd->TenChuDe }}</a></li>
                                    @endforeach
                                 </ul>
                              </li>
                           </ul>
                     </li>
                     <li> <a class="{{Request::is('lienhe') ? 'active' : ''}}" href="/lienhe">Liên hệ</a></li>

                     <li style="color: black;font-size:14px;font-weight:bold;"> <a class="{{Request::is('listcart') ? 'active' : ''}}@section('cart')@show" href="/listcart"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG (
                        @if(Session::has('Cart'))
                           <span id="total-quanty-show">{{ Session::get('Cart')->totalQuanty }}</span>
                        @else
                           <span id="total-quanty-show">trống</span>
                        @endif)</a>
                           <ul><li><div class="product-table" id="change-item-cart">
                              @if (session('Cart'))
                              <table class="table">
                                 <tbody>
                                    @foreach (session('Cart')->products as $item)
                                    <tr>
                                          <td class="col-md-2"><img src="/images/{{ $item['product']['AnhSanPham'] }}" width="50" alt=""></td>
                                          <td class="col-md-6">
                                             <div class="product-selected">
                                                @if ($item['product']->GiaKhuyenMai != 0)
                                                   <p><del>{{ number_format($item['product']['GiaSanPham']) }}</del></p>&nbsp;
                                                   <p>{{ number_format($item['product']['GiaKhuyenMai']) }} x {{ $item['quanty']}}</p>
                                                @else
                                                   <p>{{ number_format($item['product']['GiaSanPham']) }} x {{ $item['quanty']}}</p>
                                                @endif
                                                <h6>{{ $item['product']['TenSanPham'] }}</h6>
                                             </div>
                                          </td>
                                          <td class="col-md-2"><p><b>{{ number_format($item['price']) }}</b> <i>vnđ</i></p></td>
                                          <td class="col-md-1"><i class="close fas fa-times" data-id={{$item['product']['Id']}}></i></td>
                                    </tr>
                                    @endforeach
                                       <tr>
                                          <td><p>total: {{ session('Cart')->totalQuanty }}</p></td>
                                          <td> => </td>
                                          <td><h5>{{ number_format(session('Cart')->totalPrice) }} <i>vnđ</i></h5></td>
                                          <input type="hidden" id="total-quanty" value="">
                                       </tr>
                                 </tbody>
                              </table>
                              @else
                              <div>
                                 <h5>Bạn chưa quyết định chọn sản phẩm nào!</h5>
                                 <p>total => 0 <i>vnđ</i></p>
                              </div>
                              @endif
                           </div></li></ul>
                     </li>
                  </ul>
               </div>
               <div class="search_icon">
                  <ul>
                     <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
            <!-- menu end -->
         </div>
      </div>
   </div>
</div>
<!-- header bottom end -->

   <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
   <script>
      $('#change-item-cart').on("click", ".fa-times", function(){
         // console.log($(this).data("id"));
         $.ajax({
         url: '/del-from-cart/'+$(this).data("id"),
         type: 'GET',
         }).done(function(response){
            console.log(response);
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            // $("#list-cart").empty();
            // $("#list-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty").val());
            alertify.success('Xóa giỏ hàng thành công!');
         });
      });
   </script>