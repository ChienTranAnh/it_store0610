@extends('layoutsAd.admin')

@section('title', 'Slide')
@section('thanhphan', 'Slide')

@section('slide', 'is-expanded')
<?php $index = 1;?>
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="form-group" style="text-align: right">
            <h3 style="float: left">Slide</h3>
            <div>
               <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
            </div>
         </div>
         <div class="tile-body table-responsive table--no-card m-b-40">
            <table class="table table-hover table-bordered table-borderless table-striped" id="danhSachTable">
               <thead class="thead-light text-center">
                  <tr>
                     <th>STT</th>
                     <th>Id</th>
                     <th>Ảnh</th>
                     <th>Tiêu đề</th>
                     <th>Filename</th>
                     <th>Chọn ảnh</th>
                     <th>Tác vụ</th>
                  </tr>
               </thead>
               <tbody>
               @foreach($slides as $sl)
                  <tr>
                     <td>{{$index++}}</td>
                     <td>{{$sl->Id}}</td>
                     <td><img src="/slide/{{$sl->Anh}}" alt="{{$sl->Anh}}" width="250"></td>
                     <td>{{$sl->TieuDe}}</td>
                     <td>{{$sl->Anh}}</td>
                     <form class="form-horizontal" action="/slide/chonanh/{{ $sl->Id }}" method="POST">
                        <td>
                           @switch($sl->AnhChon)
                              @case(0)
                                 <div class="animated-radio-button">
                                    <label>
                                       <input type="radio" id="0" name="AnhChon" value="0" checked><span class="label-text"> Chưa duyệt</span>
                                    </label></br>
                                    <label>
                                       <input type="radio" id="1" name="AnhChon" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                    </label>
                                 </div>
                                 @break
                              @case(1)
                                 <div class="animated-radio-button">
                                    <label>
                                       <input type="radio" id="0" name="AnhChon" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                    </label></br>
                                    <label>
                                       <input type="radio" id="1" name="AnhChon" value="1" checked><span class="label-text"> Duyệt</span>
                                    </label>
                                 </div>
                                 @break
                              @default
                           @endswitch
                        </td>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <td class="text-center">
                           {{-- <a href="sua/{{$sl->Id}}" class="btn btn-primary" title="Sửa"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                           <a href="xoa/{{$sl->Id}}" class="btn btn-danger" title="Xóa"><i class="fas fa-trash-alt"></i></a></br></br>
                           <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i> Duyệt</button> --}}
                           <a class="btn" href="sua/{{$sl->Id}}" title="Sửa"><i class="fas fa-pencil-alt" style="color: #146e6f"></i></a>
                           <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="xoa/{{$sl->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a></br>
                        </td>
                     </form>
                  </tr>
               @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
