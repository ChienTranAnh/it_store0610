@extends('layoutsAd.admin')

@section('title', 'Danh sách sản phẩm')
@section('thanhphan', 'Danh sách sản phẩm')

@section('sanpham', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         {{-- <form action="/blog/danhsach" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
            <div class="form-group" style="text-align: right">
               <h3 style="float: left">Danh sách sản phẩm</h3>
               <div>
                  <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                     <h4>Tìm nhanh:</h4>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-1 text-left">
                     <button type="submit" class="btn btn-info"><i class="fas fa-check-double"> Duyệt</i></button>
                  </div>
                  <div class="col-md-11">
                     <form action="/sanpham/danhsach" method="GET">
                        <fieldset class="row">
                           <div class="col-md-3">
                              {{-- <input type="text" name="tuKhoa" class="form-control" value="{{ $tuKhoa??'' }}" placeholder="Bạn muốn tìm kiếm sản phẩm gì?"> --}}
                              <input type="text" name="tuKhoa" class="form-control" value="{{ $tuKhoa??'' }}" placeholder="Sản phẩm muốn tìm?">
                           </div>
                           <div class="col-md-3">
                              <select name="tkDanhMuc" class="form-control">
                                 {{-- <option value="">- - - Danh mục sản phẩm mong muốn?</option> --}}
                                 <option value="">- - Theo danh mục sản phẩm?</option>
                                 @if (isset($danhMucs))
                                       @foreach ($danhMucs as $dm)
                                       @if ($maDM == $dm->Id)
                                          <option selected="selected" value="{{$dm->Id}}">{{$dm->DanhMuc}}</option>
                                       @else
                                          <option value="{{$dm->Id}}">{{$dm->DanhMuc}}</option>
                                       @endif
                                       @endforeach
                                 @endif
                              </select>
                           </div>
                           <div class="col-md-2">
                              <select name="tkThuongHieu" class="form-control">
                                 {{-- <option value="">- - - Thương hiệu yêu thích?</option> --}}
                                 <option value="">- - Theo thương hiệu?</option>
                                 @if (isset($thuongHieus))
                                       @foreach ($thuongHieus as $th)
                                       @if ($maTH == $th->Id)
                                          <option selected="selected" value="{{$th->Id}}">{{$th->ThuongHieu}}</option>
                                       @else
                                          <option value="{{$th->Id}}">{{$th->ThuongHieu}}</option>
                                       @endif
                                       @endforeach
                                 @endif
                              </select>
                           </div>
                           <div class="col-md-1">
                              <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                           </div>
                           @if(session('thongBao'))
                              <div class="col-md-3">
                                 <div class="alert {{ session('class') }}">
                                    {{ session('thongBao') }}
                                 </div>
                              </div>
                           @endif
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
            <div class="tile-body">
               <table class="table table-hover table-bordered table-borderless table-striped">
                  <thead class="thead-light text-center">
                     <tr>
                        <th class="text-center">
                           <div class="animated-checkbox">
                              <label>
                                 <input type="checkbox" id="selectAll"><span class="label-text"></span>
                              </label>
                              </div>
                        </th>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th style="width: 28%">Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Đã bán</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Tình trạng</th>
                        <th>Đã duyệt</th>
                        <th>Tác vụ</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($sanPhams as $sp)
                  <tr>
                     <td class="text-center">
                        <div class="animated-checkbox">
                           <label>
                              <input type="checkbox" id="td-checkbox-{{ $sp->Id }}"><span class="label-text"></span>
                           </label>
                        </div>
                     </td>
                     <td>{{$index++}}</td>
                     <td><img src="/images/{{$sp->AnhSanPham}}" width="50" alt="Ảnh sản phẩm"></td>
                     <td>{{$sp->TenSanPham}}&nbsp;&nbsp;&nbsp;<a style="float: right" href="/sanphamchitiet/{{ $sp->Id }}" target="_blank" title="Đường dẫn sản phẩm"><i style="color: #009688" class="fas fa-link"></i></a></td>
                     <td>
                        {{number_format($sp->GiaSanPham)}}
                        @if ($sp->GiaKhuyenMai)
                              &nbsp;<span style="color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                        @endif
                     </td>
                     <td>{{$sp->SoLuong}}</td>
                     <td>{{$sp->DaBan}}</td>
                     <td>{{$sp->DanhMucId}}</td>
                     <td>{{$sp->ThuongHieuId}}</td>
                     <form class="form-horizontal" action="/sanpham/chitiet/{{ $sp->Id }}" method="POST">
                        <td>
                           <select class="form-control" name="TrangThaiId">
                           <option value="">- - - - -</option>
                              @if ($trangThais)
                                 @foreach ($trangThais as $tt)
                                    @if ($sp->TrangThaiId == $tt->Id)
                                    <option selected="selected" value="{{ $tt->Id }}">{{$tt->TrangThai}}</option>
                                    @else
                                       <option value="{{ $tt->Id }}">{{ $tt->TrangThai }}</option>
                                    @endif
                                 @endforeach
                              @endif
                           </select>
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           {{-- @if ($trangThais)
                              @foreach ($trangThais as $tt)
                                    @if ($sp->TrangThaiId == $tt->Id)
                                    @switch($tt->Id)
                                          @case(1)
                                             <span style="color: green">{{$tt->TrangThai}}</span>
                                             @break
                                          @case(2)
                                             <span style="color: red">{{$tt->TrangThai}}</span>
                                             @break
                                          @case(3)
                                             <span style="color: navy">{{$tt->TrangThai}}</span>
                                             @break
                                          @default
                                    @endswitch
                                    @endif
                              @endforeach
                           @endif --}}
                        </td>
                        <td>
                        {{-- @switch($sp->DaDuyet)
                           @case(1)
                              <div class="animated-radio-button">
                                 <label>
                                 <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text"> Duyệt</span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i></span>
                                 </label>
                              </div>
                                 @break
                           @case(2)
                              <div class="animated-radio-button">
                                 <label>
                                 <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text"> Đang xem</span>
                                 </label>
                              </div>
                                 @break
                           @default
                              <div class="animated-radio-button">
                                 <label>
                                 <input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text"> Chưa duyệt</span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                 </label></br>
                                 <label>
                                 <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i></span>
                                 </label>
                              </div>
                        @endswitch --}}
                           @switch($sp->DaDuyet)
                              @case(0)
                                    <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa</i>
                                    @break
                              @case(1)
                                    <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"> Duyệt</i>
                                    @break
                              @case(2)
                                    <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"> Xem</i>
                                    @break
                              @default
                           @endswitch
                        </td>
                        <td class="text-center">
                              {{-- <a class="btn btn-info" href="/sanpham/chitiet/{{$sp->Id}}" title="Xem"><i class="fas fa-info"></i></a>&nbsp;
                              <a class="btn btn-primary" href="/sanpham/sua/{{$sp->Id}}" title="Sửa"><i class="fas fa-pen"></i></a>&nbsp;
                              <a class="btn btn-danger" href="/sanpham/xoa/{{$sp->Id}}" title="Xóa"><i class="far fa-trash-alt"></i></a></br></br>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i> Duyệt</button> --}}
                              <a class="btn" href="/sanpham/chitiet/{{$sp->Id}}" title="Xem"><i class="fas fa-info" style="color: navy"></i></a>
                              <a class="btn" href="/sanpham/sua/{{$sp->Id}}" title="Sửa"><i class="fas fa-pen" style="color: #146e6f"></i></a>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/sanpham/xoa/{{$sp->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a></br>
                        </td>
                     </form>
                  </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         {{-- </form> --}}
         {{ $sanPhams->links() }}
      </div>
   </div>
</div>
@endsection