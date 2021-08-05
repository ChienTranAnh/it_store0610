@extends('layouts.master')

@section('title', 'Giỏ hàng')
@section('breadcrumb', 'Giỏ hàng')
@section('body', 'it_serv_shopping_cart shopping-cart')

@section('content')
    @includeIf('layouts.breadcrumb')
    <div class="section padding_layout_1 Shopping_cart_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12" id="list-cart">
                    <div class="product-table table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá sản phẩm</th>
                                    <th class="text-center">Thành tiền</th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('Cart'))
                            @foreach (session('Cart')->products as $item)
                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media"> <a class="thumbnail pull-left" href="/sanphamchitiet/{{ $item['product']->Id }}">
                                            <img style="width: 130px" class="media-object" src="/images/{{ $item['product']->AnhSanPham }}"
                                                alt="{{ $item['product']->TenSanPham }}"></a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="/sanphamchitiet/{{ $item['product']->Id }}">{{ $item['product']->TenSanPham }}</a></h4>
                                                <span>Status: </span>
                                                <span class="text-success">
                                                    @foreach ($trangThai as $tt)
                                                        @if ($item['product']->TrangThaiId == $tt->Id)
                                                            {{ $tt->TrangThai }}
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input id="quanty-item-{{$item['product']->Id}}" class="form-control" value="{{ $item['quanty'] }}" type="number" min="1" max="{{$item['product']->SoLuong}}">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        @if ($item['product']->GiaKhuyenMai != 0)
                                            <p class="price_table"><del>{{ number_format($item['product']->GiaSanPham) }}</del></p>&nbsp;
                                            <p class="new_price">{{ number_format($item['product']->GiaKhuyenMai) }}</p>
                                        @else
                                            <p class="price_table">{{ number_format($item['product']->GiaSanPham) }}</p>
                                        @endif
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <p class="price_table"><b>{{ number_format($item['price']) }}</b> <i>vnđ</i></p>
                                    </td>
                                    <td class="col-md-1">
                                        <button class="bt_save" onclick="update_list_cart({{ $item['product']->Id }})"><i class="fas fa-save"></i></button>
                                    </td>
                                    <td class="col-md-1">
                                        <button class="bt_main" onclick="del_list_cart({{ $item['product']->Id }})"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr><td colspan="6" class="text-center"><h5>Bạn chưa sẵn sàng tiêu tiền!</h5></td></tr>
                            @endif
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                            <tr class="cart-form">
                                <td class="actions">
                                    <div class="coupon">
                                        <input name="coupon_code" class="input-text" id="coupon_code" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <input class="button" name="update_cart" value="Update cart" disabled="" type="submit">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="shopping-cart-cart">
                        <table>
                            <tbody>
                                @if(Session::has('Cart'))
                                <tr class="head-table">
                                    <td><h4 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h4></td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td><h4>Số sản phẩm:</h4></td>
                                    <td class="text-right"><h4>{{ session('Cart')->totalQuanty }}</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Tổng tiền:</h4></td>
                                    <td class="text-right"><h4>{{ number_format(session('Cart')->totalPrice) }} <i>vnđ</i></h4></td>
                                </tr>
                                <tr>
                                    <td><h5>Phí ship:</h5></td>
                                    <td class="text-right"><h4>0</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Thành tiền:</h4></td>
                                    <td class="text-right"><h4>{{ number_format(session('Cart')->totalPrice) }} <i>vnđ</i></h4></td>
                                </tr>
                                    @if(session('Cart')->totalPrice > 0)
                                    <tr>
                                        <td><button type="button" class="button" data-dismiss="modal">Sắm tiếp</button></td>
                                        <td><a href="/checkout"><button class="button">Đặt hàng</button></a></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><button type="button" class="button" data-dismiss="modal">Quay lại sắm đồ</button></td>
                                    </tr>
                                    @endif
                                @else
                                <tr class="head-table">
                                    <td><h4 style="font-family: Tahoma, Geneva, Verdana, sans-serif;">TẠM TÍNH</h4></td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td><h4>Số sản phẩm:</h4></td>
                                    <td class="text-right"><h4>0</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Tổng tiền:</h4></td>
                                    <td class="text-right"><h4>0 <i>vnđ</i></h4></td>
                                </tr>
                                <tr>
                                    <td><h5>Phí ship:</h5></td>
                                    <td class="text-right"><h4>0</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Thành tiền:</h4></td>
                                    <td class="text-right"><h4>0 <i>vnđ</i></h4></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="button" data-dismiss="modal">Quay lại sắm đồ</button></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
    <script>
        function update_list_cart(id) {
            // console.log($("#quanty-item-"+id).val());
            $.ajax({
                url: '/update-list-cart/' + id + '/' + $("#quanty-item-"+id).val(),
                type: 'GET',
                }).done(function (response) {
                console.log(response);
                xuLy(response);
                alertify.success('Cập nhật giỏ hàng thành công!');
            });
        }

        function del_list_cart(id){
            // console.log(id);
            $.ajax({
                url: '/del-from-list-cart/' + id,
                type: 'GET',
                }).done(function (response) {
                console.log(response);
                xuLy(response);
                alertify.success('Xóa giỏ hàng thành công!');
            });
        }

        function xuLy(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty").val());
        }
    </script>
@endsection