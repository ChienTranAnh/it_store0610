@extends('layoutsAd.admin')

@section('title', 'Đơn hàng')

@section('thanhphan', 'Đơn hàng')

@section('donhang', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group">
                <h3>Danh sách đơn hàng</h3>
            </div>
            <div class="form-group">
                <form action="/donhang/danhsach">
                    <fieldset>
                      <legend style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px">Tìm nhanh:</legend>
                      <div class="row">
                        <label class="col-md-1"></label>
                        <div class="col-md-3">
                          <input type="text" name="tuKhoa" class="form-control" value="{{ $tuKhoa??'' }}" placeholder="Tìm đơn hàng?">
                        </div>
                        <div class="col-md-2">
                            <select name="tkTinhTrang" class="form-control">
                                <option value="">- - - Theo tình trạng đơn hàng?</option>
                                @if (isset($tinhTrangDH))
                                    @foreach ($tinhTrangDH as $tt)
                                      @if ($maTT == $tt->Id)
                                        <option selected="selected" value="{{$tt->Id}}">{{$tt->TrangThai}}</option>
                                      @else
                                        <option value="{{$tt->Id}}">{{$tt->TrangThai}}</option>
                                      @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="tkHinhThucThanhToan" class="form-control">
                                <option value="">- - - Hình thức thanh toán?</option>
                                 @if ($hThuc)
                                    <option selected="selected" value="{{$hThuc ?? ''}}">{{$hThuc ?? ''}}</option>
                                 @else
                                 <option value="Chuyển khoản">Chuyển khoản</option>
                                 <option value="COD">COD</option>
                                 <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                                 @endif
                            </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                        @if(session('thongBao'))
                           <div class="col-md-2">
                              <div class="alert alert-success">
                                 {{ session('thongBao') }}
                              </div>
                           </div>
                        @endif
                      </div>
                    </fieldset>
                  </form>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-borderless table-striped" id="t1">
                    <thead class="thead-light text-center">
                     <tr>
                           <th>STT</th>
                           <th>ID</th>
                           <th>Khách hàng</th>
                           <th>Tổng tiền</th>
                           <th>Số lượng</th>
                           <th>Hình thức thanh toán</th>
                           <th>Ghi chú</th>
                           <th>Ngày đặt hàng</th>
                           <th>Tình trạng</th>
                           <th>Đã duyệt</th>
                           <th>Hoàn thành</th>
                           <th>Tác vụ</th>
                     </tr>
                    </thead>
                    <tbody>
                    @foreach($donHangs as $dh)
                     <tr>
                        <td>{{$index++}}</td>
                        <td>{{$dh->Id}}</td>
                        <td>
                           @if ($khachHangs)
                              @foreach ($khachHangs as $kh)
                                 @if ($dh->KhachHangId == $kh->Id)
                                    <p style="font-weight: bold">{{$kh->HoTen}}</span>
                                 @endif
                              @endforeach
                           @endif
                        </td>
                        <td>{{number_format($dh->TongTien)}}</td>
                        <td>{{$dh->SoLuong}}</td>
                        <td>{{$dh->HinhThucThanhToan}}</td>
                        <td>{{$dh->GhiChu}}</td>
                        <td>{{$dh->NgayDatHang}}</td>
                        <form class="form-horizontal" action="/donhang/chitiet/{{ $dh->Id }}" method="POST">
                           <td>
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <select class="form-control" name="TrangThaiDHId">
                              <option value="">- - - - -</option>
                                 @if ($tinhTrangDH)
                                    @foreach ($tinhTrangDH as $tt)
                                       @if ($dh->TrangThaiDHId == $tt->Id)
                                       <option selected="selected" value="{{ $tt->Id }}">{{$tt->TrangThai}}</option>
                                       @else
                                          <option value="{{ $tt->Id }}">{{ $tt->TrangThai }}</option>
                                       @endif
                                    @endforeach
                                 @endif
                              </select>
                           </td>
                           <td>
                              @switch($dh->DaDuyet)
                                 @case(1)
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text"> Duyệt</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkmagenta;" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                                       @break
                                 @case(2)
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i></span>
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
                                       <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkmagenta;" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                              @endswitch
                           </td>
                           <td>
                              @switch($dh->HoanThanh)
                                 @case(1)
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1" checked><span class="label-text"> Hoàn thành</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkorange;" title="Đang chờ"></i></span>
                                       </label>
                                    </div>
                                       @break
                                 @case(2)
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Hoàn thành"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2" checked><span class="label-text"> Đang chờ</span>
                                       </label>
                                    </div>
                                       @break
                                 @default
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0" checked><span class="label-text"> Chưa</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Hoàn thành"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkorange;" title="Đang chờ"></i></span>
                                       </label>
                                    </div>
                              @endswitch
                           </td>
                           <td class="text-center">
                              <a class="btn" href="#" title="Thông tin"
                              data-hoten="{{ $kh->HoTen }}"
                              data-ngaysinh="{{ $kh->NgaySinh }}"
                              data-gioitinh="{{ $kh->GioiTinh }}"
                              data-dienthoai="{{ $kh->DienThoai }}"
                              data-email="{{ $kh->Email }}"
                              data-username="{{ $kh->UserName }}"
                              data-diachi="{{ $kh->DiaChi }}"
                              data-ngaysua="{{ $kh->NgaySUa }}"
                              data-toggle="modal" data-target="#modalChiTiet">
                                 <i class="fas fa-info" style="color: navy"></i>
                              </a>
                              {{-- <a class="btn btn-primary" href="/donhang/sua/{{$dh->Id}}" title="Sửa"><i class="fas fa-pen"></i></a>&nbsp; --}}
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/donhang/xoa/{{$dh->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                           </td>
                        </form>
                     </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $donHangs->links() }}
        </div>
    </div>
</div>

{{-- modal chi tiết khách hàng --}}
<div class="modal fade" id="modalChiTiet" tabindex="-1" role="dialog" aria-labelledby="modalChiTietLabel" aria-hidden="true">
   <form action="#" id="thongTinChiTiet">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modalChiTietLabel">Thông tin khách hàng</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="icon fas fa-times"></i></span>
               </button>
            </div>
            <div class="modal-body">
               <div class="table-responsive table--no-card m-b-30">
                  <table class="table table-borderless table-striped table-earning">
                     <thead class="thead-light">
                        <tr>
                           <th>Họ tên</th>
                           <th>Ngày sinh</th>
                           <th>Giới tính</th>
                           <th class="text-right">Điện thoại</th>
                           <th class="text-right">Tên đăng nhập</th>
                           <th class="text-right">Ngày sửa</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td id="HoTen"></td>
                           <td id="NgaySinh"></td>
                           <td id="GioiTinh"></td>
                           <td class="text-right" id="DienThoai"></td>
                           <td class="text-right" id="UserName"></td>
                           <td class="text-right" id="NgaySua"></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               {{-- <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                     <div class="form-group">
                        <label class="control-label col-md-6">Họ tên</label>
                        <div class="col-md-12">
                           <input class="form-control" name="HoTen" id="HoTen" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <label class="control-label col-md-6">Ngày sinh</label>
                        <div class="col-md-12">
                           <input class="form-control" name="NgaySinh" id="NgaySinh" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-6">Điện thoại</label>
                        <div class="col-md-12">
                           <input class="form-control" name="DienThoai" id="DienThoai" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-6">Tên đăng nhập</label>
                        <div class="col-md-12">
                           <input class="form-control" name="UserName" id="UserName" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <label class="control-label col-md-6">Giới tính</label>
                        <div class="col-md-12">
                           <input class="form-control" name="GioiTinh" id="GioiTinh" required="" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-6">Email</label>
                        <div class="col-md-12">
                           <input class="form-control" name="Email" id="Email" required="" type="text">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-6">Ngày sửa</label>
                        <div class="col-md-12">
                           <input class="form-control" name="NgaySua" id="NgaySua" required="" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                     <div class="form-group">
                        <label class="control-label col-md-6">Địa chỉ</label>
                        <div class="col-md-12">
                           <textarea class="form-control" name="DiaChi" id="DiaChi" cols="3"></textarea>
                        </div>
                     </div>
                  </div>
               </div> --}}
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i>Đóng</button>
            </div>
         </div>
      </div>
   </form>
</div>
{{-- end modal --}}

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script>
      $(document).ready(function () {
         $('#modalChiTiet').on('show.bs.modal', function (e) {
            var hoten = $(e.relatedTarget).attr('data-hoten');
            var ngaysinh = $(e.relatedTarget).attr('data-ngaysinh');
            var gioitinh = $(e.relatedTarget).attr('data-gioitinh');
            var dienthoai = $(e.relatedTarget).attr('data-dienthoai');
            var email = $(e.relatedTarget).attr('data-email');
            var username = $(e.relatedTarget).attr('data-username');
            var diachi = $(e.relatedTarget).attr('data-diachi');
            var ngaysua = $(e.relatedTarget).attr('data-ngaysua');
            $('#HoTen').html(hoten);
            $('#NgaySinh').html(ngaysinh);
            $('#GioiTinh').html(gioitinh);
            $('#DienThoai').html(dienthoai);
            $('#Email').html(email);
            $('#UserName').html(username);
            $('#DiaChi').html(diachi);
            $('#NgaySua').html(ngaysua);
         });
      });

      // var arr = [];
      // $('#t1 tr').each(function () {
      //    var id = $(this).find("td").eq(2).html();
      //    var soluong = $(this).find("td").eq(4).html();
      //    var tien = $(this).find("td").eq(3).html();
      //    arr.push({"Khách hàng":id, "Số lượng": soluong, "Tổng tiền":tien});
      // });
      // console.log(arr);
</script>
@endsection