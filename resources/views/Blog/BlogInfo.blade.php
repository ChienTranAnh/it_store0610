@extends('layoutsAd.admin')

@section('title')
  View {{ $blogs->TieuDe }}
@endsection

@section('thanhphan', 'Duyệt sản phẩm')
@section('blog', 'is-expanded')
@section('blog_detail', 'active')

<?php $index = 1; ?>
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="invoice">
            <div class="row mb-4">
               <div class="col-8">
                  <h2 class="page-header"><i class="far fa-newspaper"></i> {{ $blogs->TieuDe }}</h2>
               </div>
               <div class="col-4">
                  <h5 class="text-right"><i class="far fa-user"></i>
                     @foreach ($bloger as $blg)
                        @if ($blogs->BloggerId == $blg->Id)
                           {{ $blg->UserName }}
                        @endif
                     @endforeach
                  </h5>
               </div>
            </div>
            <div class="row invoice-info">
               <div class="col-4">
                  <img src="/blogs/{{ $blogs->Anh }}" width="400" alt="Ảnh {{ $blogs->TieuDe }}">
               </div>
               <div class="col-2"></div>
               <div class="col-5">
                  <div class="card-body">
                     <form class="form-horizontal" action="/blog/chitiet/{{ $blogs->Id }}" method="POST">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <table class="table">
                        <thead>
                           <tr>
                           <th>Chủ đề</th>
                           <th>Tình trạng</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="col-md-8">
                                 <select class="form-control" name="ChuDeId">
                                    <option value="">- - - - -</option>
                                       @if ($chuDes)
                                       @foreach ($chuDes as $cd)
                                             @if ($blogs->ChuDeId == $cd->Id)
                                             <option selected="selected" value="{{ $cd->Id }}">{{$cd->TenChuDe}}</option>
                                             @else
                                             <option value="{{ $cd->Id }}">{{ $cd->TenChuDe }}</option>
                                             @endif
                                       @endforeach
                                       @endif
                                 </select>
                                 </div>
                              </td>
                              <td>
                                 <div class="col-md-8">
                                 @switch($blogs->DaDuyet)
                                       @case(0)
                                          <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"> Chưa duyệt</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                          </div>
                                          @break
                                       @case(1)
                                          <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"> Đã duyệt</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text">Đang xem</span></label>
                                          </div>
                                          @break
                                       @case(2)
                                          <i class="icon fas fa-spinner" style="color: grey" title="Đang xem"> Đang xem</i></br></br>
                                          <div class="animated-radio-button">
                                             <label><input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text">Chưa duyệt</span></label></br>
                                             <label><input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text">Duyệt</span></label></br>
                                             <label><input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text">Đang xem</span></label>
                                          </div>
                                          @break
                                       @default
                                 @endswitch
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" style="text-align: right">
                                 <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Done</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/blog/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </form>
                     <div class="row">
                        @if (Session('thongBao'))
                           <div class="alert {{ session('class') }}" role="alert">
                              {{ Session('thongBao') }}
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12 table-responsive">
                  <table class="table table-striped">
                     <thead>
                     <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Chủ đề</th>
                        <th>Lượt xem</th>
                        <th>Ngày viết</th>
                        <th>Người viết</th>
                        <th>Ngày sửa</th>
                        <th>Ngày duyệt</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $blogs->Id }}</td>
                        <td>{{ $blogs->TieuDe }}</td>
                        <td>{{ $blogs->ChuDeId }}</td>
                        <td>{{ $blogs->LuotXem }}</td>
                        <td>{{ $blogs->NgayTao }}</td>
                        <td>
                           @foreach ($bloger as $blg)
                                 @if ($blogs->BloggerId == $blg->Id)
                                    {{ $blg->UserName }}
                                 @endif
                           @endforeach
                        </td>
                        <td>{{ $blogs->NgaySua }}</td>
                        <td>{{ $blogs->NgayDuyet }}</td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row"><label for=""></label></div>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                  {!! $blogs->MoTa !!}
               </div>
               <div class="col-md-2"></div>
               <div class="col-md-2"></div>
               <div class="col-md-8">
                  {!! $blogs->NoiDung !!}
               </div>
            </div>
            <div class="row">
               <label class="control-label col-md-10"></label>
                  <div class="col-md-2 col-md-offset-3">
                     <a href="/blog/sua/{{ $blogs->Id }}"><button class="btn btn-primary" type="submit" href="" target="_blank"><i class="fas fa-edit"></i>Sửa</button></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/blog/danhsach"><i class="fas fa-backward"></i>Trở về</a>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection