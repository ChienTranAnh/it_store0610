@extends('layoutsAd.admin')

@section('title', 'Danh sách người dùng')
@section('thanhphan', 'Danh sách người dùng')

@section('nguoidung', 'is-expanded')
<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Danh sách người dùng</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="form-group">
                <form action="/nguoidung/danhsach">
                    <fieldset>
                        <legend style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px">Tìm nhanh:</legend>
                      <div class="row">
                        <label class="col-md-1"></label>
                        <div class="col-md-4">
                          <input type="text" name="tuKhoa" class="form-control" value="{{ $tuKhoa??'' }}" placeholder="Tìm theo họ tên / username / email / điện thoại ?">
                        </div>
                        <div class="col-md-3">
                            <select name="tkVaiTro" class="form-control">
                                <option value="">- - - Theo vai trò?</option>
                                @foreach ($vaiTros as $vt)
                                    @if ($maVT == $vt->Id)
                                        <option selected="selected" value="{{ $vt->Id }}">{{$vt->VaiTro}}</option>
                                    @else
                                        <option value="{{$vt->Id}}">{{$vt->VaiTro}}</option>
                                    @endif
                                @endforeach
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
                <table class="table table-hover table-bordered table-borderless table-striped">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($nguoiDung as $us)
                        <tr>
                           <td>{{$index++}}</td>
                           <td>{{$us->Id}}</td>
                           <td>{{$us->UserName}}</td>
                           <td>{{$us->HoTen}}</td>
                           <td>{{$us->DienThoai}}</td>
                           <td>{{$us->Email}}</td>
                           <td>{{$us->DiaChi}}</td>
                           <form class="form-horizontal" action="/nguoidung/vaitro/{{ $us->Id }}" method="POST">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <td>
                                 <select class="form-control col-sm-9" name="VaiTroId">
                                       <option value="">- - -</option>
                                       @foreach ($vaiTros as $vt)
                                          @if ($us->VaiTroId == $vt->Id)
                                             <option selected="selected" value="{{$vt->Id}}">{{$vt->VaiTro}}</option>
                                          @else
                                             <option value="{{$vt->Id}}">{{$vt->VaiTro}}</option>
                                          @endif
                                       @endforeach
                                 </select>
                              </td>
                              <td class="text-center">
                                 {{-- <a href="/nguoidung/chitiet/{{$us->Id}}" title="Sửa"><button class="btn btn-info"><i class="fas fa-info"></i></button></a></br> --}}
                                 <a class="btn" href="/nguoidung/sua/{{$us->Id}}" title="Sửa"><i class="fas fa-user-edit" style="color:#146e6f"></i></a>
                                 <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color:black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <a href="/nguoidung/xoa/{{$us->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                              </td>
                           </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(session('message'))
                <div class="col-md-6">
                    <div class="alert {{session('class')}}">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection