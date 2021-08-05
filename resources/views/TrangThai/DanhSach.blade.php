@extends('layoutsAd.admin')

@section('title', 'Danh sách trạng thái')
@section('thanhphan', 'Danh sách trạng thái các loại')

@section('trangthai', 'is-expanded')
@section('ttdanhsach', 'active')
<?php $index = 1;?>
<?php $indexx = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Trạng thái sản phẩm</h3>
                <div>
                    <a href="/trangthai/them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Trạng thái</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trangThais as $tt)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$tt->Id}}</td>
                        <td>{{$tt->TrangThai}}</td>
                        <td>{{$tt->MoTa}}</td>
                        <td class="text-center">
                            <a class="btn" href="/trangthai/sua/{{$tt->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/trangthai/xoa/{{$tt->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                            {{-- <button class="btn btn-danger" onclick="del()" title="Xóa"><i class="fas fa-trash-alt"></i></button> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
                <h3 style="float: left">Tình trạng đơn hàng</h3>
                <div>
                    <a href="/tinhtrang/them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="tile-body table-responsive table--no-card m-b-40">
                <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTableTT">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tình trạng</th>
                        <th>Mô tả</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tinhTrangs as $tts)
                    <tr>
                        <td>{{$indexx++}}</td>
                        <td>{{$tts->Id}}</td>
                        <td>{{$tts->TrangThai}}</td>
                        <td>{{$tts->MoTa}}</td>
                        <td class="text-center">
                            <a class="btn" href="/tinhtrang/sua/{{$tts->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/tinhtrang/xoa/{{$tts->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function del() {
      opt = confirm("Bạn muốn xóa trạng thái này không?\nMuốn lắm -> Ok\nBạn suy nghĩ lại hoặc ấn nhầm - > Hủy");
      if (!opt){
          return;
      }
    }
</script>
@endsection
