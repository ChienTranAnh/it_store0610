@extends('layouts.master')

@section('title', 'Register')

@section('breadcrumb', 'Register')
@section('body', 'make_appointment')

@section('content')
    @includeIf('layouts.breadcrumb')
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="main_heading text_align_center">
                                    <h3>ĐĂNG KÝ THÀNH VIÊN</h3>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 appointment_form">
                                <div class="form_section">
                                    <form class="form_contant" method="POST" action="/register">
                                        <fieldset class="row">
                                            <div class="col-md-12">
                                                @if ($thongBao)
                                                    <div class="alert alert-success" role="alert">
                                                        {{ $thongBao }}
                                                    </div>
                                                @endif
                                                @if (Session('message'))
                                                    <div class="alert alert-warning" role="alert">
                                                        {{ Session('message') }}
                                                    </div>
                                                @endif
                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        @foreach ($errors->all() as $err)
                                                            {{ $err }}</br>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            {{-- <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="Id" placeholder="Id (Không bắt buộc)" type="text">
                                            </div> --}}
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="HoTen" type="text" placeholder="Họ tên *" value="{{$khachHangs->HoTen??''}}">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="NgaySinh" id="NgaySinh" type="text" placeholder="Ngày sinh *" value="{{$khachHangs->NgaySinh??''}}">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <select class="field_custom" name="GioiTinh">
                                                    <option value="">- - -</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="DienThoai" placeholder="Số điện thoại *" type="text" value="{{$khachHangs->DienThoai??''}}">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="Email" placeholder="Địa chỉ email *" type="email" value="{{$khachHangs->Email??''}}">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="UserName" placeholder="UserName *" type="text" value="{{$khachHangs->UserName??''}}">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="MatKhau" placeholder="Mật khẩu *" type="password">
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" name="MatKhau_return" placeholder="Nhập lại mật khẩu *" type="password">
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea style="min-height: 100px;" class="field_custom" name="DiaChi" placeholder="Địa chỉ">{{$khachHangs->DiaChi??''}}</textarea>
                                            </div>
                                            <div class="center">
                                                <button type="submit" class="btn main_bt"><i class="fas fa-check-circle"></i> Đăng ký</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- bootstrap --}}
    {{-- <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> --}}
    
    {{-- jQuery --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
            // $('#NgaySinh').datepicker({
            //     format: "yyyy-mm-dd",
            //     autoclose: true,
            //     changeMonth: true,
            //     changeYear: true,
            //     todayHighlight: true
            // });
            $( "#NgaySinh" ).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                autoclose: true,
            });
    </script>
@endsection