<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Cart;
class CartProductController extends Controller
{
    //Thêm sản phẩm vào giỏ hàng
    public function addProductToCart(Request $request, $id){
        $sanpham = SanPham::find($id);
        // dd($sanpham->sp_gia);
        Cart::add($sanpham->sp_id, $sanpham->sp_ten, $request->sp_soluong,$sanpham->sp_gia,0);
        return redirect()->back();
    }

    // Lấy sản phẩm trong giỏ hàng
    public function getProductToCart(){
        $cart = Cart::content();
       return view('client.giohang.chi-tiet-gio-hang',compact('cart'));
    }
    // cập nhật giỏ hàng
    public function updateProductToCart(Request $request,$id){
        Cart::update($id, $request->qty);
        $cart = Cart::content();
       return view('client.giohang.chi-tiet-gio-hang',compact('cart'));
    }


    public function destroyProductToCart(){
       Cart::destroy();
       return redirect()->route('client.index');
    }


     
}
