@extends('layoutsAd.admin')

@section('title', 'Sửa bài viết')

@section('thanhphan', 'Sửa bài viết')
@section('blog', 'is-expanded')

@section('content')
<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="/blog/sua/{{ $blogs->Id }}" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Bài viết</h2>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Id:</label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" name="Id" value="{{ $blogs->Id ?? '' }}" disabled>
                        </div>

                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-1">Người sửa <span class="red">*</span> :</label>
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
                            <input class="form-control" type="text" name="TieuDe" value="{{ $blogs->TieuDe ?? '' }}" placeholder="Nhập tên sản phẩm mới">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Chủ đề <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="ChuDeId">
                                        @if (isset($chuDes))
                                        <option value="">- - - Chủ đề - - -</option>
                                            @foreach ($chuDes as $cd)
                                                @if($blogs->ChuDeId == $cd->Id)
                                                    <option selected="selected" value="{{$cd->Id}}">{{$cd->TenChuDe}}</option>
                                                @else
                                                    <option value="{{$cd->Id}}">{{$cd->TenChuDe}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Chọn ảnh khác:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="AnhBV">
                                    <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-3">
                                    <img src="/blogs/{{ $blogs->Anh }}" width="400" alt="Ảnh bài viết">
                                </div>
                            </div>
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
                            <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/blog/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
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