@extends('layouts.master')

@section('title', 'Trang chủ')
@section('body', 'it_service')

@section('content')
<!-- section -->
<div id="slider" class="section main_slider">
   <div class="container-fuild">
      <div class="row">
         <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
            <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
               <ul>
                  @foreach ($slide as $sl)
                     <li data-index="rs-1812" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="/slide/{{ $sl->Anh }}"  data-rotate="0"  data-saveperformance="off"  data-title="{{ $sl->TieuDe }}" data-description="">
                     <!-- MAIN IMAGE -->
                           <img src="/slide/{{ $sl->Anh }}"  alt="#"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                           <!-- LAYERS -->
                           <!-- LAYER NR. BG -->
                           <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-0" 
                                          id="slide-270-layer" 
                                          data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                          data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                          data-width="full"
                                          data-height="full"
                                          data-whitespace="nowrap"
                                          data-transform_idle="o:1;"
                                          data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                                          data-transform_out="s:300;s:300;" 
                                          data-start="750" 
                                          data-basealign="slide" 
                                          data-responsive_offset="on" 
                                          data-responsive="off"
                                          style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
                           <!-- LAYER NR. 1 -->
                              <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                                          id="slide-18-layer" 
                                          data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                          data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                                          data-width="500"
                                          data-height="140"
                                          data-whitespace="nowrap"
                                          data-transform_idle="o:1;"
                                          data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                                          data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                          data-mask_in="x:0px;y:0px;" 
                                          data-mask_out="x:inherit;y:inherit;" 
                                          data-start="2000" 
                                          data-responsive_offset="on" 
                                          style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
                           <!-- LAYER NR. 2 -->
                           <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                                          id="slide-18-layer" 
                                          data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                          data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                          data-fontsize="['70','70','70','35']"
                                          data-lineheight="['70','70','70','50']"
                                          data-width="none"
                                          data-height="none"
                                          data-whitespace="nowrap"
                                          data-transform_idle="o:1;"
                                          data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                                          data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                          data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                                          data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                          data-start="1000" 
                                          data-splitin="chars" 
                                          data-splitout="none" 
                                          data-responsive_offset="on" 
                                          data-elementdelay="0.05" 
                                          style="z-index: 6; white-space: nowrap;">{{ $sl->TieuDe }}</div>
                           <!-- LAYER NR. 3 -->
                           <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                                       data-width="none"
                                       data-height="none"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                                       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                       data-start="1500" 
                                       data-splitin="none" 
                                       data-splitout="none" 
                                       data-responsive_offset="on" 
                                       style="z-index: 7; white-space: nowrap;">Evrything in It-store!</div>
                     </li>
                  @endforeach
                  {{-- <li data-index="rs-181" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="/slide/{{ $sl->Anh }}"  data-rotate="0"  data-saveperformance="off"  data-title="{{ $sl->TieuDe }}" data-description="">
                     <!-- MAIN IMAGE -->
                     <img src="/slide/{{ $sl->Anh }}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                     <!-- LAYERS -->
                     <!-- LAYER NR. BG -->
                     <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                                       id="slide-270-layer-101" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                       data-width="full"
                                       data-height="full"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                                       data-transform_out="s:300;s:300;" 
                                       data-start="750" 
                                       data-basealign="slide" 
                                       data-responsive_offset="on" 
                                       data-responsive="off"
                                       style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
                     <!-- LAYER NR. 1 -->
                     <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-91" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                                       data-width="500"
                                       data-height="140"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:0px;" 
                                       data-mask_out="x:inherit;y:inherit;" 
                                       data-start="2000" 
                                       data-responsive_offset="on" 
                                       style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
                     <!-- LAYER NR. 2 -->
                     <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-11" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                       data-fontsize="['70','70','70','35']"
                                       data-lineheight="['70','70','70','50']"
                                       data-width="none"
                                       data-height="none"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                                       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                       data-start="1000" 
                                       data-splitin="chars" 
                                       data-splitout="none" 
                                       data-responsive_offset="on" 
                                       data-elementdelay="0.05" 
                                       style="z-index: 6; white-space: nowrap;">{{ $sl->TieuDe }}</div>
                     <!-- LAYER NR. 3 -->
                     <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-41" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                                       data-width="none"
                                       data-height="none"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                                       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                       data-start="1500" 
                                       data-splitin="none" 
                                       data-splitout="none" 
                                       data-responsive_offset="on" 
                                       style="z-index: 7; white-space: nowrap;">Available On It.Next </div>
                  </li>

                  <li data-index="rs-18" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="/slide/{{ $sl->Anh }}"  data-rotate="0"  data-saveperformance="off"  data-title="{{ $sl->TieuDe }}" data-description="">
                     <!-- MAIN IMAGE -->
                     <img src="/slide/{{ $sl->Anh }}"  alt="{{ $sl->Anh }}"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                     <!-- LAYERS -->
                     <!-- LAYER NR. BG -->
                     <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                                       id="slide-270-layer-10" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                       data-width="full"
                                       data-height="full"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                                       data-transform_out="s:300;s:300;" 
                                       data-start="750" 
                                       data-basealign="slide" 
                                       data-responsive_offset="on" 
                                       data-responsive="off"
                                       style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
                     <!-- LAYER NR. 1 -->
                     <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-9" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                                       data-width="500"
                                       data-height="140"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:0px;" 
                                       data-mask_out="x:inherit;y:inherit;" 
                                       data-start="2000" 
                                       data-responsive_offset="on" 
                                       style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
                     <!-- LAYER NR. 2 -->
                     <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-1" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                       data-fontsize="['70','70','70','35']"
                                       data-lineheight="['70','70','70','50']"
                                       data-width="none"
                                       data-height="none"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                                       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                       data-start="1000" 
                                       data-splitin="chars" 
                                       data-splitout="none" 
                                       data-responsive_offset="on" 
                                       data-elementdelay="0.05" 
                                       style="z-index: 6; white-space: nowrap;">{{ $sl->TieuDe }}</div>
                     <!-- LAYER NR. 3 -->
                     <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                                       id="slide-18-layer-4" 
                                       data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                       data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                                       data-width="none"
                                       data-height="none"
                                       data-whitespace="nowrap"
                                       data-transform_idle="o:1;"
                                       data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                                       data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                                       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                                       data-start="1500" 
                                       data-splitin="none" 
                                       data-splitout="none" 
                                       data-responsive_offset="on" 
                                       style="z-index: 7; white-space: nowrap;">It.Next </div>
                  </li> --}}
                  
               </ul>
               <div class="tp-static-layers">
                  @php
                  if(session('thongBao')) {
                     // echo '<script>alert("Đăng nhập không thành công!")</script>';
                     echo session('thongBao');
                  }
                  @endphp
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="section padding_layout_1">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <div class="main_heading text_align_center">
                  <h2>Sản phẩm khuyến mại</h2>
                  <p class="large">Giảm giá rồi, shopping thôi!</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach($sPham as $sp)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
               <div class="product_list">
                  @if($sp->GiaKhuyenMai != 0)
                     <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                  @elseif($sp->TrangThaiId == 2)
                     <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                  @elseif($sp->TrangThaiId == 3)
                     <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                  @endif
                  <div class="product_img"> <img class="img-responsive" src="/images/{{ $sp->AnhSanPham }}" alt="{{ $sp->TenSanPham }}"> </div>
                  <div class="product_detail_btm">
                     <div class="center">
                        <h4><a href="/sanphamchitiet/{{ $sp->Id }}">{{ $sp->TenSanPham }}</a></h4>
                     </div>
                     <div class="starratin">
                        <div class="center">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="product_price">
                        @if ($sp->GiaKhuyenMai != 0)
                           <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span> – <span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                        @else
                           <p><span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span></p>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      <div class="row"><a href="/sanphamkhuyenmai" class="btn btn-primary">Khuyến mại</a></div>
   </div>

   <div class="container">
      <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <div class="main_heading text_align_center">
                     <h2>Sản phẩm mới</h2>
                     <p class="large">Các sản phẩm được cập nhật liên tục.</p>
                  </div>
               </div>
            </div>
      </div>
      <div class="row">
         @foreach($new_sp as $sp)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
               <div class="product_list">
                  @if($sp->GiaKhuyenMai != 0)
                     <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                  @elseif($sp->TrangThaiId == 2)
                     <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                  @elseif($sp->TrangThaiId == 3)
                     <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                  @endif
                  <div class="product_img"> <img class="img-responsive" src="/images/{{ $sp->AnhSanPham }}" alt="{{ $sp->TenSanPham }}"> </div>
                  <div class="product_detail_btm">
                     <div class="center">
                     <h4><a href="/sanphamchitiet/{{ $sp->Id }}">{{ $sp->TenSanPham }}</a></h4>
                     </div>
                     <div class="starratin">
                        <div class="center">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="product_price">
                        @if ($sp->GiaKhuyenMai != 0)
                           <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span> – <span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                        @else
                           <p><span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span></p>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      <div class="row"><a href="/sanpham" class="btn btn-primary">Các sản phẩm</a></div>
   </div>

   <div class="container">
      <div class="row">
            <div class="col-md-12">
               <div class="full">
                  <div class="main_heading text_align_center">
                     <h2>Tất cả sản phẩm</h2>
                     <p class="large">Trải nghiệm những sản phẩm mà Itstore có.</p>
                  </div>
               </div>
            </div>
      </div>
      <div class="row">
         @foreach($sanPham as $sp)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
               <div class="product_list">
                  @if($sp->GiaKhuyenMai != 0)
                     <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                  @elseif($sp->TrangThaiId == 2)
                     <div class="ribbon-wrapper"><div class="ribbon noproduct">Hết</div></div>
                  @elseif($sp->TrangThaiId == 3)
                     <div class="ribbon-wrapper"><div class="ribbon comming">Sắp về</div></div>
                  @endif
                  <div class="product_img">
                     <img class="img-responsive" src="/images/{{ $sp->AnhSanPham }}" alt="{{ $sp->TenSanPham }}">
                  </div>
                  <div class="product_detail_btm">
                     <div class="center">
                        <h4><a href="/sanphamchitiet/{{ $sp->Id }}">{{ $sp->TenSanPham }}</a></h4>
                     </div>
                     <div class="starratin">
                        <div class="center">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                     </div>
                     <div class="product_price">
                        @if ($sp->GiaKhuyenMai != 0)
                           <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span> – <span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                        @else
                           <p><span class="new_price"><i class="fa fa-dollar"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span></p>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      <div class="row"><a href="/sanpham" class="btn btn-primary">Tất cả</a></div>
   </div>

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="full">
               <div class="main_heading text_align_center">
                  <h2>Bài viết gần nhất</h2>
                  <p class="large">Hãy tham khảo bài viết của chúng tôi!</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         @foreach ($blog as $bl)
         <div class="col-md-4">
            <div class="full blog_colum">
            <div class="blog_feature_img"> <img src="/blogs/{{ $bl->Anh }}" alt="Ảnh bài viết" /> </div>
            <div class="post_time">
               <p><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($bl->NgaySua)->format('d M Y H:m') }}</p>
            </div>
            <div class="blog_feature_head">
               <h4><a href="/blog-detail/{{ $bl->Id }}">{{ $bl->TieuDe }}</a></h4>
            </div>
            <div class="blog_feature_cont">{{-- <p>{!! $bl->MoTa !!}</p> --}}</div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="row"><a href="/sanpham" class="btn btn-primary">Xem thêm</a></div>
   </div>
</div>
<!-- end section -->
@endsection