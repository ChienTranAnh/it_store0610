@extends('layoutsAd.admin')

@section('title', 'Danh sách vai trò')
@section('thanhphan', 'Danh sách vai trò')

@section('vaitro', 'is-expanded')
<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Phân quyền</h3>
                <div>
                    <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Vai trò</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vaiTros as $vt)
                    <tr class="text-center">
                        <td>{{$index++}}</td>
                        <td>{{$vt->Id}}</td>
                        <td>{{$vt->VaiTro}}</td>
                        <td>{{$vt->MoTa}}</td>
                        <td>
                            <a class="btn" href="sua/{{$vt->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color:#146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            {{-- <button type="button" class="btn btn-danger" data-id_xoa="{{$vt->Id}}" title="Xóa"><i class="fas fa-trash-alt"></i></button> --}}
                            <a href="xoa/{{$vt->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color:red"></i></a>
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