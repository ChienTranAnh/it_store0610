<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalQuanty = 0;
    public $totalPrice = 0;

    public function __construct($cart)
    {
        if($cart)
        {
            $this->products = $cart->products;
            $this->totalQuanty = $cart->totalQuanty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    // thêm giỏ hàng
    public function addCart($product, $id)
    {
        if ($product->GiaKhuyenMai != 0) {
            $gioHang = ['quanty' => 0, 'price' => $product->GiaKhuyenMai, 'product' => $product];
        } else {
            $gioHang = ['quanty' => 0, 'price' => $product->GiaSanPham, 'product' => $product];
        }
        if ($this->products)
        {
            if (array_key_exists($id, $this->products))
            {
                $gioHang = $this->products[$id];
            }
        }

        $gioHang['quanty']++;
        if ($product->GiaKhuyenMai !=0) {
            $gioHang['price'] = $product->GiaKhuyenMai * $gioHang['quanty'];
        } else {
            $gioHang['price'] = $product->GiaSanPham * $gioHang['quanty'];
        }
        $this->products[$id] = $gioHang;
        $this->totalQuanty++;
        if ($product->GiaKhuyenMai != 0) {
            $this->totalPrice += $product->GiaKhuyenMai;
        } else {        
            $this->totalPrice += $product->GiaSanPham;
        }
    }

    // cập nhật số lượng của sp trong giỏ hàng
    public function updateItemCart($id, $quanty)
    {
        // xóa bỏ số lượng và thành tiền của sp muốn thay đổi
        $this->totalQuanty -= $this->products[$id]['quanty']; // tổng số lượng mới bằng tổng slg cũ trừ số lượng sp muốn thay đổi
        $this->totalPrice -= $this->products[$id]['price']; // tổng tiền mới bằng tổng tiền cũ trừ tiền sp muốn thay đổi
 
        // tính số lượng và thành tiền của sp vừa thay đổi
        $this->products[$id]['quanty'] = $quanty; // số lượng mới của sp bằng số lượng đã thay đổi
        
        // giá mới của sp bằng giá sp x slg vừa thay đổi
        if ($this->products[$id]['product']->GiaKhuyenMai == 0) {
            $this->products[$id]['price'] = $quanty * $this->products[$id]['product']->GiaSanPham;
        } else {
            $this->products[$id]['price'] = $quanty * $this->products[$id]['product']->GiaKhuyenMai;
        }

        // cập nhật lại giỏ hàng
        $this->totalQuanty += $this->products[$id]['quanty']; // tổng số lượng mới bằng tổng slg cũ cộng thêm số lượng sp vừa thay đổi
        $this->totalPrice += $this->products[$id]['price']; // tổng tiền mới bằng tổng tiền cũ cộng thêm tiền sp vừa thay đổi
    }

    // xóa sp trong giỏ hàng
    public function delCart($id)
    {
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
