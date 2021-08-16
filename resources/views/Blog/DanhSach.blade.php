@extends('layoutsAd.admin')

@section('title', 'Danh sách bài viết')

@section('thanhphan', 'Danh sách bài viết')

@section('blog', 'is-expanded')

<?php $index = 1;?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
               <div class="form-group" style="text-align: right">
                  <h3 style="float: left">Danh sách bài viết</h3>
                  <div>
                     <a href="them-moi"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-1"></div>
                     <div class="col-md-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                        <h4>Tìm nhanh:</h4>
                     </div>
                  </div>
                  <div class="row">
            {{-- <form action="/blog/danhsach" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                     <div class="col-md-1 text-left">
                        <button id="Duyet" type="submit" class="btn btn-info"><i class="fas fa-check-double"> Duyệt</i></button>
                     </div>
                     <div class="col-md-11">
                        <form action="/blog/danhsach">
                           <fieldset>
                              <div class="row">
                                 <label class="col-md-1"></label>
                                 <div class="col-md-4">
                                    <input type="text" name="tuKhoa" class="form-control" value="{{ $tuKhoa??'' }}" placeholder="Bài viết muốn tìm?">
                                 </div>
                                 <div class="col-md-3">
                                    <select name="tkChuDe" class="form-control">
                                       <option value="">- - - Theo chủ để ?</option>
                                       @if (isset($chuDes))
                                          @foreach ($chuDes as $cd)
                                             @if ($maCD == $cd->Id)
                                                <option selected="selected" value="{{$cd->Id}}">{{$cd->TenChuDe}}</option>
                                             @else
                                                <option value="{{$cd->Id}}">{{$cd->TenChuDe}}</option>
                                             @endif
                                          @endforeach
                                       @endif
                                    </select>
                                 </div>
                                 <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                                 </div>
                                 @if(session('thongBao'))
                                    <div class="col-md-3">
                                       <div class="alert {{ session('class') }}">
                                          {{ session('thongBao') }}
                                       </div>
                                    </div>
                                 @endif
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="tile-body">
                  <table class="table table-hover table-bordered table-borderless table-striped" id="dynamic-table">
                     <thead class="thead-light text-center">
                     <tr>
                           <th class="text-center">
                              <div class="animated-checkbox">
                                 <label>
                                 <input type="checkbox" id="selectAll"><span class="label-text"></span>
                                 </label>
                              </div>
                           </th>
                           <th>STT</th>
                           <th>Owner</th>
                           <th>Ảnh</th>
                           <th>ID</th>
                           <th style="width: 40%">Tên bài viết</th>
                           <th>Chủ đề</th>
                           <th>Đã duyệt</th>
                           <th>Viewed</th>
                           <th>Tác vụ</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($blogs as $bl)
                        <tr>
                           <td class="text-center">
                              <div class="animated-checkbox">
                                 <label>
                                    <input class="chk-selection" data-id="{{ $bl->Id }}" type="checkbox" id="td-checkbox-{{ $bl->Id }}"><span class="label-text"></span>
                                 </label>
                              </div>
                           </td>
                           <td>{{$index++}}</td>
                           <td>
                              @if ($bloger)
                                 @foreach ($bloger as $blg)
                                    @if ($bl->BloggerId == $blg->Id)
                                       <p>{{$blg->UserName}}</p>
                                    @endif
                                 @endforeach
                              @endif
                           </td>
                           <td><img src="/blogs/{{$bl->Anh}}" width="70" alt="Ảnh bài viết"></td>
                           <td>{{$bl->Id}}</td>
                           <td>{{$bl->TieuDe}}&nbsp;&nbsp;&nbsp;<a style="float:right" href="/blog-detail/{{ $bl->Id }}" target="_blank" title="Đường dẫn bài viết"><i style="color: #009688" class="fas fa-link"></i></a></td>
                           <form class="form-horizontal" action="/blog/chitiet/{{ $bl->Id }}" method="POST">
                           <td>
                              <select class="form-control" name="ChuDeId">
                                 <option value="">- - - - -</option>
                                    @if ($chuDes)
                                       @foreach ($chuDes as $cd)
                                          @if ($bl->ChuDeId == $cd->Id)
                                             <option selected="selected" value="{{ $cd->Id }}">{{$cd->TenChuDe}}</option>
                                          @else
                                             <option value="{{ $cd->Id }}">{{ $cd->TenChuDe }}</option>
                                          @endif
                                       @endforeach
                                    @endif
                              </select>
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                           </td>
                           <td>
                              @switch($bl->DaDuyet)
                                    @case(1)
                                          <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"><span class="label-text"> Duyệt</span></i>
                                          @break
                                    @case(2)
                                          <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"><span class="label-text"> Xem</span></i>
                                          @break
                                    @default
                                          <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"><span class="label-text"> Chưa</span></i>
                                          @break
                                 @endswitch
                              {{-- @switch($bl->DaDuyet)
                                 @case(1)
                                    <div class="animated-radio-button">
                                       <label>
                                          <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text"> Duyệt</span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                                    @break
                                 @case(2)
                                    <div class="animated-radio-button">
                                       <label>
                                          <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text"> Đang xem</span>
                                       </label>
                                    </div>
                                    @break
                                 @default
                                    <div class="animated-radio-button">
                                       <label>
                                          <input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text"> Chưa duyệt</span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Đã duyệt"></i></span>
                                       </label></br>
                                       <label>
                                          <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                                    @break
                              @endswitch --}}
                           </td>
                           <td class="text-center">{{ $bl->LuotXem }}</td>
                           <td class="text-center">
                              {{-- <a class="btn btn-info" href="/blog/chitiet/{{$bl->Id}}" title="Xem"><i class="fas fa-info"></i></a>&nbsp;
                              <a class="btn btn-primary" href="/blog/sua/{{$bl->Id}}" title="Sửa"><i class="fas fa-pen"></i></a>&nbsp;
                              <a class="btn btn-danger" href="/blog/xoa/{{$bl->Id}}" title="Xóa"><i class="far fa-trash-alt"></i></a></br></br>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i> Duyệt</button> --}}
                              <a class="btn" href="/blog/chitiet/{{$bl->Id}}" title="Xem"><i class="fas fa-info" style="color: blue"></i></a>
                              <a class="btn" href="/blog/sua/{{$bl->Id}}" title="Sửa"><i class="fas fa-pen" style="color: #146e6f"></i></a>
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/blog/xoa/{{$bl->Id}}" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                           </td>
                           </form>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
            {{-- </form> --}}
            {{ $blogs->links() }}
        </div>
    </div>
</div>

		<!-- inline scripts related to this page -->
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
      
      <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

		<script type="text/javascript">
         $(document).ready(function(){

            //Khi tick vào checkbox trên cùng thì tick chọn tất cả các checkbox bên dưới
            $('#selectAll').on('change', function(){
               $('.chk-selection').each(function(idx, element){
                  if($('#selectAll').is(':checked')){//Kiểm tra nếu checkbox trên cùng được tick
                     $(element).prop('checked', 'checked');//tick chọn checkbox
                  }
                  else {
                        $(element).prop('checked', '');//bỏ tick chọn checkbox
                  }
               });
            });

            //Cứ mỗi 250ms thì kiểm tra xem các checkbox nào được tick không, nếu có thì đưa id của blog vào mảng
            setInterval(function(){
               var bl_id_arr = [];
               $('.chk-selection').each(function(idx, element){
                  if($(element).is(':checked')){
                     var bl_id = $(element).attr('data-id');
                     bl_id_arr.push(bl_id);//đưa id của blog vào mảng
                     sessionStorage.setItem('blog_id_arr', JSON.stringify(bl_id_arr));//chuyển mảng chứa id của blog thành JSON rồi đưa vào sesion
                  }
               });
            }, 250);

            //Khi nhấn nút duyệt thì gửi mảng id trong session lên server
            $('#Duyet').on('click', function(){
               $.ajax({
                  url : '/blog/chitiet',
                  method : 'get',
                  data : {
                     'blog_id_arr' : sessionStorage.getItem('blog_id_arr')
                  }
               })
               .done(function (data) {
                  if(data.message == 'success'){ //nếu phản hồi về success thì reload lại trang web
                     location.reload();
                  }
                  else {
                     alert(data);
                  }
               });
            });
         });
		</script>
@endsection
