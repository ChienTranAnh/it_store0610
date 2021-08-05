@extends('layoutsAd.admin')

@section('title', 'New blog')

@section('thanhphan', 'New blog')
@section('blog', 'is-expanded')

@section('content')
<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="them-moi" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Bài viết</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Id:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" name="Id" value="{{ $blogs->Id ?? '' }}" placeholder="Mã bài viết mới (không bắt buộc)">
                        </div>

                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Người viết bài <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            @if (session('user'))
                            <input type="text" class="form-control" id="" value="{{session('user')->UserName}}" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Tiêu đề <span class="red">*</span> :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="TieuDe" value="{{ $blogs->TieuDe ?? '' }}" placeholder="Nhập tiều đề bài viết mới">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Ảnh bài viết <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <input class="form-control" type="file" name="AnhBV">
                            <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                        </div>

                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Chủ đề <span class="red">*</span> :</label>
                        <div class="col-md-3">
                            <select class="form-control" name="ChuDeId">
                                @if (isset($chuDes))
                                <option value="">- - - Chủ đề - - -</option>
                                    @foreach ($chuDes as $cd)
                                        <option value="{{$cd->Id}}">{{$cd->TenChuDe}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="MoTa" id="ckeditor" rows="5">{{ $blogs->MoTa ?? '' }}</textarea>
                            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace('ckeditor',
                                {
                                    width: '100%',
                                    height: 150
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Nội dung <span class="red">*</span> :</label>
                        <div class="row">
                            <label class="control-label col-md-1"></label>
                            <div class="col-md-10">
                                <textarea class="row form-control" rows="10" name="NoiDung" id="NoiDung">{{ $blogs->NoiDung ?? '' }}</textarea>
                                <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                                <script>
                                    CKEDITOR.replace('NoiDung',{
                                        width: '100%',
                                        height: 800
                                    });
                                </script>
                            </div>
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
                    <div class="row">
                        <label class="col-md-3"></label>
                        <div class="col-md-6">
                            <div class="alert {{ $class ?? '' }}" role="alert">
                                {{ $thongBao ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<div class="clearix"></div>
@endsection
