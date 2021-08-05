@extends('layoutsAd.admin')

@section('title', 'Danh sách danh mục sản phẩm')

@section('thanhphan', 'Danh sách danh mục sản phẩm')

@section('danhmuc', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Danh mục sản phẩm</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã danh mục</th>
                        <th>Danh mục</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($danhMucs as $dm)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$dm->Id}}</td>
                        <td>{{$dm->DanhMuc}}</td>
                        <td>{{$dm->MoTa}}</td>
                        <td class="text-center">
                            {{-- <a href="sua/{{$dm->Id}}" class="btn btn-primary" title="Sửa"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                            <a href="xoa/{{$dm->Id}}" class="btn btn-danger" title="Xóa"><i class="fas fa-trash-alt"></i></a> --}}
                            <a class="btn" href="sua/{{$dm->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="xoa/{{$dm->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
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
