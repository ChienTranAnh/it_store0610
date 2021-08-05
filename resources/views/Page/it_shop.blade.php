@extends('layouts.master')

@section('title', 'Sản phẩm')
@section('breadcrumb', 'Sản phẩm')
@section('sanpham', 'active')
@section('body', 'it_shop_list')

@section('content')
  @includeIf('layouts.breadcrumb')

<!-- section -->
<div class="section padding_layout_1 product_list_main">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">Hiển thị {{ count($sanPham) }} sản phẩm/ trang</div>
        <div class="row"><label class="col-md-12"></label></div>
        <div class="row">
          @foreach ($sanPham as $sp)
            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
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
                    <div class="center"> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="far fa-star" aria-hidden="true"></i> </div>
                  </div>
                  <div class="product_price col-md-12">
                    @if ($sp->GiaKhuyenMai > 0)
                      <p><span class="old_price"><i class="fas fa-dollar-sign"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span></br><span class="new_price"><i class="fas fa-dollar"></i> {{ number_format($sp->GiaKhuyenMai) }} <i>vnđ</i></span></p>
                    @else
                      <p><span class="new_price"><i class="fas fa-dollar-sign"></i> {{ number_format($sp->GiaSanPham) }} <i>vnđ</i></span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="row">{{ $sanPham->links() }}</div>
      </div>
      <div class="col-md-3">
        @includeIf('layouts.rightbarProduct')
      </div>
    </div>
  </div>
</div>
<!-- end section -->
@endsection