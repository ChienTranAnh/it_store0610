@extends('layoutsAd.admin')

@section('title')
  View {{ $sanPhams->TenSanPham }}
@endsection

@section('thanhphan', 'Duyệt sản phẩm')
@section('sanpham', 'is-expanded')
@section('chitietsanpham', 'active')

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="invoice">
            <div class="row mb-4">
               <div class="col-8">
                  <h2 class="page-header"><i class="fa fa-globe"></i> {{ $sanPhams->TenSanPham }}
                     @if ($sanPhams->GiaKhuyenMai)
                     &nbsp;<span style="font-size:16px;color: red" title="Khuyến mại"><i class="fab fa-kaggle"></i></span>
                     @endif
                  </h2>
               </div>
               <div class="col-4">
                  <h5 class="text-right"><i class="fas fa-dollar-sign"></i> {{ number_format($sanPhams->GiaSanPham) }} vnđ</h5>
               </div>
            </div>
            <div class="row invoice-info">
               <div class="col-4">
                  <img src="/images/{{ $sanPhams->AnhSanPham }}" width="400" alt="Ảnh {{ $sanPhams->TenSanPham }}">
               </div>
               <div class="col-2"></div>
               <div class="col-5">
                  <div class="card-body">
                     <form class="form-horizontal" action="/sanpham/chitiet/{{ $sanPhams->Id }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Tình trạng sản phẩm</th>
                                 <th>Tình trạng</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="col-md-8">
                                       <select class="form-control" name="TrangThaiId">
                                          <option value="">- - - - -</option>
                                          @if ($trangThais)
                                             @foreach ($trangThais as $tt)
                                                @if ($sanPhams->TrangThaiId == $tt->Id)
                                                   <option selected="selected" value="{{ $tt->Id }}">{{$tt->TrangThai}}</option>
                                                @else
                                                   <option value="{{ $tt->Id }}">{{ $tt->TrangThai }}</option>
                                                @endif
                                             @endforeach
                                          @endif
                                       </select>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="col-md-8">
                                       @switch($sanPhams->DaDuyet)
                                          @case(1)
                                             <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"> Đã duyệt</i></br></br>
                                             <div class="animated-radio-button">
                                                <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                                <label><input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text">Duyệt</span></label></br>
                                                <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                             </div>
                                             @break
                                          @case(2)
                                             <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"> Đang xem</i></br></br>
                                             <div class="animated-radio-button">
                                                <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                                <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                                <label><input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text">Đang xem</span></label>
                                             </div>
                                             @break
                                          @default
                                             <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa duyệt</i></br></br>
                                             <div class="animated-radio-button">
                                                <label><input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text">Chưa duyệt</span></label></br>
                                                <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                                <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                             </div>
                                       @endswitch
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: right">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Done</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </form>
                     <div class="row">
                        @if (Session('thongBao'))
                           <div class="alert alert-success" role="alert">
                              {{ Session('thongBao') }}
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12 table-responsive">
                  <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Id</th>
                              <th>Sản phẩm</th>
                              <th>Giá k/mại</th>
                              <th>Số lượng</th>
                              <th>Đã bán</th>
                              <th>Đơn vị</th>
                              <th>Danh mục</th>
                              <th>Thương hiệu</th>
                              <th>Ngày tạo</th>
                              <th>Ngày sửa</th>
                              <th>Ngày duyệt</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>{{ $sanPhams->Id }}</td>
                              <td>{{ $sanPhams->TenSanPham }}</td>
                              <td>{{ number_format($sanPhams->GiaKhuyenMai) }}</td>
                              <td>{{ $sanPhams->SoLuong }}</td>
                              <td>{{ $sanPhams->DaBan }}</td>
                              <td>{{ $sanPhams->DonVi }}</td>
                              <td>
                                 @if ($danhMucs)
                                    @foreach ($danhMucs as $dm)
                                       @if ($sanPhams->DanhMucId == $dm->Id)
                                       <span>{{$dm->DanhMuc}}</span>
                                       @endif
                                    @endforeach
                                 @endif
                              </td>
                              <td>
                                 @if ($thuongHieus)
                                    @foreach ($thuongHieus as $th)
                                       @if ($sanPhams->ThuongHieuId == $th->Id)
                                       <span>{{$th->ThuongHieu}}</span>
                                       @endif
                                    @endforeach
                                 @endif
                              </td>
                              <td>{{ $sanPhams->NgayTao }}</td>
                              <td>{{ $sanPhams->NgaySua }}</td>
                              <td>{{ $sanPhams->NgayDuyet }}</td>
                           </tr>
                        </tbody>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">{!! $sanPhams->MoTa !!}</div>
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-8">{!! $sanPhams->NoiDung !!}</div>
            </div>
            <div class="row">
               <label class="control-label col-md-10"></label>
               <div class="col-md-2 col-md-offset-3">
                  <a href="/sanpham/sua/{{ $sanPhams->Id }}"><button class="btn btn-primary" type="submit" href="" target="_blank"><i class="fas fa-edit"></i>Sửa</button></a>&nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-backward"></i>Trở về</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection