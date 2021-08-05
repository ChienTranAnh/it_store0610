@extends('layouts.master')

@section('title')
  {{ $sanPham->TenSanPham }}
@endsection

@section('breadcrumb', 'Chi tiết sản phẩm')
@section('sanpham', 'active')
@section('body', 'it_shop_detail')

<link rel="stylesheet" href="{{asset('/It_next/css/mystyle.css')}}" />

@section('content')
  @includeIf('layouts.breadcrumb')

<!-- section -->
<div class="section padding_layout_1 product_detail">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <div class="row">
               <div class="col-xl-6 col-lg-12 col-md-12">
                  <div class="product_detail_feature_img hizoom hi2">
                     <div class='hizoom hi2'>
                        @if($sanPham->GiaKhuyenMai != 0)
                           <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @elseif($sanPham->TrangThaiId == 2)
                           <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                        @elseif($sanPham->TrangThaiId == 3)
                           <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                        @endif
                        <img src="/images/{{ $sanPham->AnhSanPham }}" width="400" alt="{{ $sanPham->TenSanPham }}" />
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
                  <div class="product-heading"><h2>{{ $sanPham->TenSanPham }}</h2></div>
                  <div class="product-detail-side">
                     @if ($sanPham->GiaKhuyenMai > 0)
                        <span><del>${{ number_format($sanPham->GiaSanPham) }}</del></span><span class="new-price">${{ number_format($sanPham->GiaKhuyenMai) }} <b style="font-size: 16px"><i>vnđ</i></b></span></br>
                     @else
                        <span class="new-price">${{ number_format($sanPham->GiaSanPham) }} <b style="font-size: 16px"><i>vnđ</i></b></span></br>
                     @endif
                     <span class="rating">
                        <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="far fa-star" aria-hidden="true"></i>
                     </span>
                     <span class="review">(5 customer review)</span>
                  </div>
                  <div class="detail-contant">
                     {!! $sanPham->MoTa !!}
                     <br>
                     @foreach ($trangThai as $tt)
                        @if($sanPham->TrangThaiId == $tt->Id)
                           @switch($tt->Id)
                              @case(1)
                                 <span class="stock" style="color: green"><b>{{ $tt->TrangThai }}</b></span></br>
                                 Số lượng: <span class="stock">{{ $sanPham->SoLuong }}</span></p>
                                 <div class="cart">
                                    <div class="quantity"><input step="1" min="1" max="{{ $sanPham->SoLuong }}" name="quanty" value="1" title="Qty" class="input-text qty text" size="4" type="number"></div>
                                    <button onclick="addCart({{ $sanPham->Id }})" class="btn sqaure_bt"><i class="icon fas fa-cart-plus"></i> &nbsp; thêm giỏ hàng</button>
                                 </div>
                                 @break
                              @case(2)
                                 <span class="stock" style="color: red"><b>{{ $tt->TrangThai }}</b></span></br>
                                 <span class="col-md-6"></span>
                                 @break
                              @case(3)
                                 <span class="stock" style="color: navy"><b>{{ $tt->TrangThai }}</b></span></br>
                                 <span class="stock col-md-6"></span>
                                 @break
                              @default
                           @endswitch
                        @endif
                     @endforeach
                  </div>
                  <div class="share-post"> <a href="#" class="share-text">Gửi cho bạn bè:</a>
                     <ul class="social_icons">
                        <li><a href="https://www.facebook.com/chien.toet"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="tab_bar_section">
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Miêu tả</a> </li>
                           <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Nhận xét ()</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div id="description" class="tab-pane active">
                              <div class="product_desc">
                                 <button class="btn-flat btn-hover btn-view-description" id="view-all-description">
                                    xem tiếp
                                 </button>
                                 <div class="product-detail-description-content">
                                    {!! $sanPham->NoiDung !!}
                                 </div>
                              </div>
                           </div>
                           <div id="reviews" class="tab-pane fade">
                              <div class="product_review">
                                 <h3>Nhận xét ()</h3>
                                 <div class="commant-text row">
                                    <div class="col-lg-2 col-md-2 col-sm-4">
                                       <div class="profile"> <img class="img-responsive" src="#" alt="client 1"> </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                       <h5>David</h5>
                                       <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                       <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                       <p class="msg">ThisThis book is a treatise on the theory of ethics, very popular during the Renaissance. 
                                       The first line of Lorem Ipsum, “Lorem ipsum dolor sit amet.. </p>
                                    </div>
                                 </div>
                                 <div class="commant-text row">
                                       <div class="col-lg-2 col-md-2 col-sm-4">
                                          <div class="profile"> <img class="img-responsive" src="#" alt="client 2"> </div>
                                       </div>
                                       <div class="col-lg-10 col-md-10 col-sm-8">
                                          <h5>Jack</h5>
                                          <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                          <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                          <p class="msg">Nunc augue purus, posuere in accumsan sodales ac, euismod at est. Nunc faccumsan ermentum consectetur metus placerat mattis. Praesent mollis justo felis, accumsan faucibus mi maximus et. Nam hendrerit mauris id scelerisque placerat. Nam vitae imperdiet turpis</p>
                                       </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="full review_bt_section">
                                          <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Nhận xét sản phẩm</a> </div>
                                       </div>
                                       <div class="full">
                                          <div id="collapseExample" class="full collapse commant_box">
                                             <form accept-charset="UTF-8" action="#" method="POST">
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Nhận xét của bạn ..."></textarea>
                                                <div class="full_bt center">
                                                   <button type="submit" class="btn sqaure_bt">Gửi</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                        <h3>Sản phẩm cùng thương hiệu</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               @if (count($sp) > 1)
                  @foreach($sp as $p)
                  @if($p->Id != $sanPham->Id)
                     <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           @if($p->GiaKhuyenMai != 0)
                              <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                           @elseif($p->TrangThaiId == 2)
                              <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                           @elseif($p->TrangThaiId == 3)
                              <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                           @endif
                           <div class="product_img"> <img class="img-responsive" src="/images/{{ $p->AnhSanPham }}" alt=""> </div>
                           <div class="product_detail_btm">
                              <div class="center">
                                 <h4><a href="/sanphamchitiet/{{ $p->Id }}">{{ $p->TenSanPham }}</a></h4>
                              </div>
                              <div class="starratin">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                              </div>
                              @if ($p->GiaKhuyenMai)
                              <div class="product_price">
                                 <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaSanPham) }} <i>vnđ</i></span> – <span class="new_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                              </div>
                              @else
                              <div class="product_price">
                                 <p><span class="new_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaSanPham) }} <i>vnđ</i></span></p>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  @endif
                  @endforeach
               @else
                  <div class="col-sm-6 col-xs-12 margin_bottom_30_all">Không tìm thấy sản phẩm cùng thương hiệu.</div>
               @endif
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                        <h3>Sản phẩm cùng danh mục</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               @if (count($sps) > 1)
                  @foreach($sps as $p)
                  @if($p->Id != $sanPham->Id)
                     <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           @if($p->GiaKhuyenMai != 0)
                              <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                           @elseif($p->TrangThaiId == 2)
                              <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                           @elseif($p->TrangThaiId == 3)
                              <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                           @endif
                           <div class="product_img"> <img class="img-responsive" src="/images/{{ $p->AnhSanPham }}" alt=""></div>
                           <div class="product_detail_btm">
                              <div class="center"><h4><a href="/sanphamchitiet/{{ $p->Id }}">{{ $p->TenSanPham }}</a></h4></div>
                              <div class="starratin">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i></div>
                              </div>
                              @if ($p->GiaKhuyenMai)
                              <div class="product_price">
                                 <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaSanPham) }} <i>vnđ</i></span> – <span class="new_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                              </div>
                              @else
                              <div class="product_price">
                                 <p><span class="new_price"><i class="fas fa-dollar-sign"></i> {{ number_format($p->GiaSanPham) }} <i>vnđ</i></span></p>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  @endif
                  @endforeach
               @else
                  <div class="col-sm-6 col-xs-12 margin_bottom_30_all">Không tìm thấy sản phẩm cùng danh mục.</div>
               @endif
            </div>
         </div>
         <div class="col-md-3">
            @includeIf('layouts.rightbarProduct')
         </div>
      </div>
   </div>
</div>
<!-- end section -->
<!-- zoom effect -->
{{-- <script src="{{asset('/It_next/js/hizoom.js')}}"></script>
<script>
    $('.hi1').hiZoom({
        width: 300,
        position: 'right'
    });
    $('.hi2').hiZoom({
        width: 400,
        position: 'right'
    });
</script> --}}
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script>
  function addCart(id){
    $.ajax({
      url: '/add-to-cart/'+id,
      type: 'GET',
      }).done(function(response){
         console.log(response);
         $("#change-item-cart").empty();
         $("#list-cart").empty();
         $("#change-item-cart").html(response);
         $("#list-cart").html(response);
         $("#total-quanty-show").text($("#total-quanty").val());
         alertify.success('Thêm vào giỏ hàng thành công!');
      });
  };
  
   document.querySelector('#view-all-description').addEventListener('click', () => {
      let content = document.querySelector('.product-detail-description-content')
      content.classList.toggle('active')
      document.querySelector('#view-all-description').innerHTML = content.classList.contains('active') ? 'thu gọn' : 'xem tiếp'
   });
</script>
@endsection