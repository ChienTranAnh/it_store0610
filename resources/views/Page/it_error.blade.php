@extends('layouts.master')

@section('title', 'Lỗi 404')
@section('breadcrumb', 'Lỗi 404')
@section('body', 'it_error')

@section('content')
  @includeIf('layouts.breadcrumb')
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="center margin_bottom_30_all"> <img class="margin_bottom_30_all" src="/It_next/images/it_service/404_error_img.png" alt="Lỗi 404"> </div>
        <div class="heading text_align_center">
          <h2>OOOPS, THIS PAGE COULD NOT BE FOUND!</h2>
        </div>
        <div class="center"> <a class="btn sqaure_bt light_theme_bt" href="/trangchu">Trở lại trang chủ</a> </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->

@endsection