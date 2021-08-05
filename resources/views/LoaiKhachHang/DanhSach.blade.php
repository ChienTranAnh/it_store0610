@extends('layoutsAd.admin')

@section('title', 'Danh sách loại khách hàng')
@section('thanhphan', 'Danh sách loại khách hàng')

@section('loaikhang', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Loại khách hàng</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i> Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã loại</th>
                        <th>Loại khách hàng</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loaiKHs as $lkh)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$lkh->Id}}</td>
                        <td>{{$lkh->LoaiKhachHang}}</td>
                        <td>{{$lkh->MoTa}}</td>
                        <td class="text-center">
                            <a class="btn" href="sua/{{$lkh->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="xoa/{{$lkh->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
