<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Cart;
use DB;
use Session;
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


    public function checkPromotion(Request $request){

        $km = DB::table('khuyenmai as km')
        ->join('loaikhuyenmai as lkm','lkm.lkm_id','km.lkm_id')
        ->where('km.km_macode',$request->km_macode)
        ->where('km.km_trangthai',0) // Lấy khuyến mãi đang được áp dụng
        ->get();
        if(COUNT($km) > 0){
            Session::forget('checkKMFalse');
            Session::flash("KM",$km[0]);
            Session::flash("checkKM");
            // DB::table('khuyenmai')->where('km_id',$km[0]->km_id)->update(
            //     [
            //         'km_trangthai'=>1 // khuyến mãi đã được sử dụng
            //     ]
            // );
            return redirect()->route('client.checkoutcart');
        }
        else
        {
             Session::forget('checkKM');
            Session::flash("checkKMFalse");
            return redirect()->route('client.checkoutcart');
        }
    }





}
