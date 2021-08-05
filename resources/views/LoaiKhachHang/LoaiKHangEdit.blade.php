@extends('layoutsAd.admin')

@section('title', 'Sửa thông tin loại khách hàng')
@section('thanhphan', 'Sửa thông tin loại khách hàng')

@section('loaikhang', 'is-expanded')

@section('content')
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="{{ $loaiKHs->Id }}">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Thông tin loại khách hàng</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mã loại khách hàng <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" value="{{ $loaiKHs->Id ?? '' }}" disabled>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Loại khách hàng <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="LoaiKhachHang" value="{{ $loaiKHs->LoaiKhachHang ?? '' }}" placeholder="Nhập loại khách hàng">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mô tả:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="MoTa" placeholder="Nhập một số thông tin về loại khách hàng">{{ $loaiKHs->MoTa ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i> Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/loaikhang/danhsach"><i class="fas fa-backward"></i> Trở về</a>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                @if (Session('message'))
                                    <div class="alert alert-warning" role="alert">
                                        {{ Session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
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
    <div class="clearix"></div>
@endsection
