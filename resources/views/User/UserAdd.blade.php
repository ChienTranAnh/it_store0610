@extends('layoutsAd.admin')

@section('title', 'Thêm mới người dùng')
@section('thanhphan', 'Thêm mới người dùng')

@section('nguoidung', 'is-expanded')

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form method="POST" class="form-horizontal" action="them-moi">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Nhập thông tin người dùng mới</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Id</label>
                                <input class="form-control" type="text" name="Id" value="{{ $nguoiDung->Id ?? '' }}" placeholder="Nhập mã người dùng (không bắt buộc)">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">UserName <span class="red">*</span></label>
                                <input class="form-control" type="text" name="UserName" value="{{ $nguoiDung->UserName ?? '' }}" placeholder="Nhập tài khoản người dùng">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="control-label">Mật khẩu <span class="red">*</span></label>
                                <input class="form-control" type="password" name="MatKhau" placeholder="Nhập mật khẩu người dùng">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Họ tên <span class="red">*</span></label>
                                <input class="form-control" type="text" name="HoTen" value="{{ $nguoiDung->HoTen ?? '' }}" placeholder="Nhập họ tên người dùng">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="control-label">Điện thoại <span class="red">*</span></label>
                                <input class="form-control" type="text" name="DienThoai" value="{{ $nguoiDung->DienThoai ?? '' }}" placeholder="Nhập điện thoại liên lạc">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-md-2">Giới tính <span class="red">*</span>:</label>
                                <div class="form-check col-md-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="GioiTinh" value="Nam">Nam
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="GioiTinh" value="Nữ">Nữ
                                    </label>
                                </div>
                                <div class="form-check col-md-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="GioiTinh" value="Khác">Khác
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Email <span class="red">*</span></label>
                                <input class="form-control" type="email" name="Email" value="{{ $nguoiDung->Email ?? '' }}" placeholder="Nhập địa chỉ email">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="control-label">Vai trò <span class="red">*</span></label>
                                <select name="VaiTroId" class="form-control">
                                    <option value="">- - -</option>
                                    @foreach ($vaiTros as $vt)
                                        <option value="{{ $vt->Id }}">{{ $vt->VaiTro }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control" rows="4" name="DiaChi" placeholder="Nhập địa chỉ người dùng">{{ $nguoiDung->DiaChi ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-user-check"></i>Thêm mới</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="danhsach"><i class="fas fa-backward"></i>Trở về</a>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                @if (Session('message'))
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ Session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $err)
                                            {{ $err }}</br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
<div class="clearix"></div>
@endsection
