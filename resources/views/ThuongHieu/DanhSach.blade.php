@extends('layoutsAd.admin')

@section('title', 'Danh sách thương hiệu')
@section('thanhphan', 'Danh sách thương hiệu')

@section('thuonghieu', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Danh sách thương hiệu</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Mã thương hiệu</th>
                        <th>Thương hiệu</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($thuongHieus as $sx)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$sx->Id}}</td>
                        <td>{{$sx->ThuongHieu}}</td>
                        <td>{{$sx->MoTa}}</td>
                        <td class="text-center">
                            {{-- <a href="sua/{{$sx->Id}}" class="btn btn-primary" title="Sửa"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                            <a href="xoa/{{$sx->Id}}" class="btn btn-danger" title="Xóa"><i class="fas fa-trash"></i></a> --}}
                            <a class="btn" href="sua/{{$sx->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="xoa/{{$sx->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
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
