@extends('layoutsAd.admin')

@section('title', 'Dashboard')
@section('thanhphan', 'Dashboard')
@section('dashboard', 'active')

@section('content')
   <div class="row">
      <div class="col-md-3">
      <div class="widget-small success"><i class="icon fas fa-users fa-3x"></i>
         <div class="info">
         <h4>Khách hàng</h4>
         <p><b>{{ count($khachHang) }}</b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      {{-- <div class="widget-small info"><i class="icon far fa-copy fa-3x"></i> --}}
      <div class="widget-small info"><i class="icon fas fa-shopping-cart fa-3x"></i>
         <div class="info">
         <h4>Đơn hàng</h4>
         <p><b>{{ count($donHang) }}</b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      <div class="widget-small warning"><i class="icon fa fa-chart-pie fa-3x"></i>
         <div class="info">
         <h4>Sản phẩm</h4>
         <p><b>{{ count($sanPham) }}</b></p>
         </div>
      </div>
      </div>
      <div class="col-md-3">
      <div class="widget-small danger"><i class="icon fas fa-pen-nib fa-3x"></i>
         <div class="info">
         <h4>Bài viết</h4>
         <p><b>{{ count($blog) }}</b></p>
         </div>
      </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Đơn hàng</h3>
               <button class="btn btn-info" onclick="window.open('{{url('/donhang/danhsach')}}','_self')"><i class="fas fa-book"></i>Danh sách</button>
            </div>
            <div class="table-responsive table--no-card m-b-30">
               <table class="table table-borderless table-striped table-earning">
                  <thead class="thead-light"><?php $soDH=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>customers</th>
                        <th>payment</th>
                        <th>notes</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">total</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($donHang as $dh)
                     <tr>
                        <td>{{ $soDH++ }}</td>
                        <td>
                           @foreach ($khachHang as $kh)
                                 @if ($dh->KhachHangId == $kh->Id)
                                    {{ $kh->HoTen }}
                                 @endif
                           @endforeach
                        </td>
                        <td>{{ $dh->HinhThucThanhToan }}</td>
                        <td>{{ $dh->GhiChu }}</td>
                        <td class="text-right">{{ $dh->SoLuong }}</td>
                        <td class="text-right">${{ number_format($dh->TongTien) }}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Khách hàng</h3>
               <button class="btn btn-success" onclick="window.open('{{url('/khachhang/danhsach')}}','_self')"><i class="fas fa-people-arrows"></i>Danh sách</button>
            </div>
         <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
               <thead class="thead-light"><?php $soKH=1; ?>
                  <tr>
                     <th>STT</th>
                     <th>name</th>
                     <th>phone</th>
                     <th>sex</th>
                     <th>email</th>
                     <th>username</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($khachHang as $kh)
                  <tr>
                     <td>{{ $soKH++ }}</td>
                     <td>{{ $kh->HoTen }}</td>
                     <td>{{ $kh->DienThoai }}</td>
                     <td>
                        @switch($kh->GioiTinh)
                           @case("Nam")
                              <i class="fas fa-mars" style="color: #009688" title="Male"></i>
                              @break
                           @case("Nữ")
                              <i class="fas fa-venus" style="color: red" title="Female"></i>
                              @break
                           @case("Khác")
                           <i class="fas fa-ellipsis-h" style="color: blueviolet" title="Other"></i>
                              @break
                           @default
                              <i class="fas fa-question" title="Hum?"></i>
                        @endswitch
                     </td>
                     <td>{{ $kh->Email }}</td>
                     <td>{{ $kh->UserName }}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Sản phẩm</h3>
               <button class="btn btn-warning" onclick="window.open('{{url('/sanpham/danhsach')}}','_self')"><i class="fas fa-laptop"></i>Danh sách</button>
            </div>
            <div class="table-responsive m-b-40">
               <table class="table table-borderless table-striped table-data3">
                  <thead class="thead-dark"><?php $soSP=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>Id</th>
                        <th>picture</th>
                        <th>products</th>
                        <th>product_type</th>
                        <th>trademark</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">price</th>
                        <th class="text-right">pro_price</th>
                        <th class="text-right">checked</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($sanPham as $sp)
                     <tr>
                        <td>{{ $soSP++ }}</td>
                        <td>{{ $sp->Id }}</td>
                        <td><img src="/images/{{ $sp->AnhSanPham }}" width="40" alt="Ảnh sản phẩm"></td>
                        <td>
                           {{ $sp->TenSanPham }}
                           @if ($sp->GiaKhuyenMai)
                                 &nbsp;<span style="color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                           @endif
                        </td>
                        <td>
                           @foreach ($danhMuc as $dm)
                                 @if ($sp->DanhMucId == $dm->Id)
                                    {{ $dm->DanhMuc }}
                                 @endif
                           @endforeach
                        </td>
                        <td>
                           @foreach ($thuongHieu as $th)
                                 @if ($sp->ThuongHieuId == $th->Id)
                                    {{ $th->ThuongHieu }}
                                 @endif
                           @endforeach
                        </td>
                        <td class="text-right">{{ $sp->SoLuong }}</td>
                        <td class="text-right">${{ number_format($sp->GiaSanPham) }}</td>
                        <td class="text-right">
                           @if($sp->GiaKhuyenMai > 0)
                              ${{ number_format($sp->GiaKhuyenMai) }}
                           @else
                           @endif
                        </td>
                        <td class="text-center">
                           @switch($sp->DaDuyet)
                              @case(1)
                                 <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i>
                                 @break
                              @case(2)
                                 <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i>
                                 @break
                              @default
                                 <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i>
                           @endswitch
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left" class="tile-title">Bài viết</h3>
               <button class="btn btn-danger" onclick="window.open('{{url('/blog/danhsach')}}','_self')"><i class="fas fa-newspaper"></i>Danh sách</button>
            </div>
            <div class="table-responsive m-b-40">
               <table class="table table-borderless table-striped table-data3">
                  <thead class="thead-dark"><?php $soBV=1; ?>
                     <tr>
                        <th>STT</th>
                        <th>Id</th>
                        <th>picture</th>
                        <th>title</th>
                        <th>topic</th>
                        <th>owner</th>
                        <th>checked</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($blog as $bl)
                     <tr>
                        <td>{{ $soBV++ }}</td>
                        <td>{{ $bl->Id }}</td>
                        <td><img src="/blogs/{{ $bl->Anh }}" width="40" alt="Ảnh bài viết"></td>
                        <td>{{ $bl->TieuDe }}</td>
                        <td>
                           @foreach ($chuDe as $cd)
                                 @if ($bl->ChuDeId == $cd->Id)
                                    {{ $cd->TenChuDe }}
                                 @endif
                           @endforeach
                        </td>
                        <td>
                           @foreach ($user as $us)
                                 @if ($bl->BloggerId == $us->Id)
                                    {{ $us->UserName }}
                                 @endif
                           @endforeach
                        </td>
                        <td class="text-center">
                           @switch($bl->DaDuyet)
                           @case(1)
                              <i class="fas fa-check" style="color: seagreen" title="Duyệt"></i>
                              @break
                           @case(2)
                              <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i>
                              @break
                           @default
                              <i class="fas fa-times" style="color: red" title="Chưa duyệt"></i>
                        @endswitch
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>