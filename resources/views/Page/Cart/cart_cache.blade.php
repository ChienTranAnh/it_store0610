@if (Session::has('Cart'))
   <table class="table" id="change-item-cart">
      <tbody>
         @foreach (session('Cart')->products as $item)
         <tr>
            <td class="col-md-2"><img src="/images/{{ $item['product']['AnhSanPham'] }}" width="50" alt=""></td>
            <td class="col-md-6">
               <div class="product-selected">
                  @if ($item['product']->GiaKhuyenMai != 0)
                     <p><del>{{ number_format($item['product']['GiaSanPham']) }}</del></p>&nbsp;
                     <p>{{ number_format($item['product']['GiaKhuyenMai']) }} x {{ $item['quanty']}}</p>
                  @else
                     <p>{{ number_format($item['product']['GiaSanPham']) }} x {{ $item['quanty']}}</p>
                  @endif
                     <h6>{{ $item['product']['TenSanPham'] }}</h6>
               </div>
            </td>
            <td><p><b>{{ number_format($item['price']) }}</b> <i>vnđ</i></p></td>
            <td class="col-md-1">
               <i class="close fas fa-times" data-id={{$item['product']['Id']}}></i>
            </td>
         </tr>
         @endforeach
         <tr>
            <td>total: {{ session('Cart')->totalQuanty }}</td>
            <input type="hidden" id="total-quanty" value="{{ session('Cart')->totalQuanty }}">
            <td> => </td>
            <td><h5>{{ number_format(session('Cart')->totalPrice) }} <i>vnđ</i></h5></td>
         </tr>
      </tbody>
   </table>
   @else
   <div class="row form-group">
      <h5>Bạn chưa quyết định chọn sản phẩm nào!</h5>
      <p>=></p>
      <h5>0 <i>vnđ</i></h5>
   </div>
@endif