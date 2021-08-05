@extends('layoutsAd.admin')

@section('title')
    Edit - {{$sanPhams->TenSanPham}}
@endsection

@section('thanhphan', 'Cập nhật sản phẩm')
@section('sanpham', 'is-expanded')

@section('content')

<div class="col-md-12">
    <form method="POST" class="form-horizontal" action="/sanpham/sua/{{ $sanPhams->Id }}" enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="panel-title">Thông tin sản phẩm</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Id:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="Id" value="{{ $sanPhams->Id }}" disabled>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Tên sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="TenSanPham" value="{{ $sanPhams->TenSanPham }}" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Giá sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="GiaSanPham" value="{{ $sanPhams->GiaSanPham }}" placeholder="Nhập giá sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Giá khuyến mại:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="GiaKhuyenMai" value="{{ $sanPhams->GiaKhuyenMai }}" placeholder="Nhập giá khuyến mại (nếu có)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Số lượng <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="SoLuong" value="{{ $sanPhams->SoLuong }}" placeholder="Nhập số lượng sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Đơn vị:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="DonVi" value="{{ $sanPhams->DonVi }}" placeholder="Đơn vị tính">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Danh mục sản phẩm <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="DanhMucId">
                                        <option value="">-- Danh mục sản phẩm --</option>
                                        @if (isset($danhMucs))
                                            @foreach ($danhMucs as $dm)
                                                @if ($sanPhams->DanhMucId == $dm->Id)
                                                    <option selected="selected" value="{{$dm->Id}}">{{$dm->DanhMuc}}</option>
                                                @else
                                                    <option value="{{$dm->Id}}">{{$dm->DanhMuc}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-4">Thương hiệu <span class="red">*</span> :</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="ThuongHieuId">
                                        <option value="">-- Thương hiệu --</option>
                                        @if (isset($thuongHieus))
                                            @foreach ($thuongHieus as $th)
                                                @if ($sanPhams->ThuongHieuId == $th->Id)
                                                    <option selected="selected" value="{{$th->Id}}">{{$th->ThuongHieu}}</option>
                                                @else
                                                    <option value="{{$th->Id}}">{{$th->ThuongHieu}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-6">
                                    <img src="/images/{{ $sanPhams->AnhSanPham }}" width="400" alt="Ảnh {{ $sanPhams->TenSanPham }}">
                                </div>
                            </div>
                            <div class="form-group row"></div>
                            <div class="form-group row">
                                <label class="control-label col-md-2"></label>
                                <label class="control-label col-md-2">Tải ảnh khác:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="AnhSP">
                                    <span style="color: darkred">Cho phép file ảnh là: jpg, jpeg, png, gif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="MoTa" id="ckeditor" rows="5">{{ $sanPhams->MoTa }}</textarea>
                            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace('MoTa',
                                {
                                    width: '100%',
                                    height: 200
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <label class="control-label col-md-2">Nội dung <span class="red">*</span> :</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-1"></label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="10" name="NoiDung" id="NoiDung">{{ $sanPhams->NoiDung }}</textarea>
                            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace('NoiDung',
                                {
                                    width: '100%',
                                    height: 1000
                                });
                            </script>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <label class="control-label col-md-8"></label>
                        <div class="col-md-3 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/sanpham/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
                        </div>
                    </div>
                    <div class="row"><label class="col-md-3"></label></div>
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
