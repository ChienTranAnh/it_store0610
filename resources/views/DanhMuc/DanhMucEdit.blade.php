@extends('layoutsAd.admin')

@section('title', 'Sửa thông tin danh mục')
@section('thanhphan', 'Sửa thông tin danh mục sản phẩm')

@section('danhmuc', 'is-expanded')

@section('content')
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="{{ $danhMucs->Id }}">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Thông tin danh mục</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mã danh mục <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" value="{{ $danhMucs->Id ?? '' }}" placeholder="Nhập mã danh mục mới" disabled>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Danh mục sản phẩm <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="DanhMuc" value="{{ $danhMucs->DanhMuc ?? '' }}" placeholder="Nhập danh mục sản phẩm mới">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mô tả:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="MoTa" placeholder="Nhập một số thông tin về danh mục">{{ $danhMucs->MoTa ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/danhmuc/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
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
