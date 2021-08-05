@extends('layoutsAd.admin')

@section('title', 'Thêm mới chủ đề')
@section('thanhphan', 'Thêm mới chủ đề')

@section('chude', 'is-expanded')

@section('content')
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="them-moi">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Nhập thông tin chủ đề mới</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mã chủ đề <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" value="{{ $chuDes->Id ?? '' }}" placeholder="Nhập mã chủ đề mới">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Chủ đề <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="TenChuDe" value="{{ $chuDes->TenChuDe ?? '' }}" placeholder="Nhập chủ đề mới">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Mô tả:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="3" name="MoTa" placeholder="Nhập một số thông tin về chủ đề">{{ $chuDes->MoTa ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Thêm mới</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="danhsach"><i class="fas fa-backward"></i>Trở về</a>
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
                        <div class="row"><label class="col-md-3"></label></div>
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
    <div class="clearix"></div>
@endsection
