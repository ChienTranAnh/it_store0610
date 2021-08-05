@extends('layoutsAd.admin')

@section('title', 'Cập nhật thông tin sản phẩm')
@section('thanhphan', 'Cập nhật sản phẩm')

@section('nguoidung', 'is-expanded')

@section('content')
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="/nguoidung/sua/{{ $nguoiDung->Id }}" enctype="multipart/form-data">
        </form>
    </div>
    <div class="clearix"></div>
@endsection